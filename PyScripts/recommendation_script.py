import pandas as pd
from sqlalchemy import create_engine
from catboost import CatBoostClassifier, Pool
import sys
import logging

# Setup logging
logging.basicConfig(level=logging.INFO, format="%(asctime)s - %(levelname)s - %(message)s")

# Database configuration
DB_USER = "root"
DB_PASSWORD = ""
DB_HOST = "localhost"
DB_NAME = "e_shop"

# Create SQLAlchemy engine
engine = create_engine(f"mysql+mysqlconnector://{DB_USER}:{DB_PASSWORD}@{DB_HOST}/{DB_NAME}")

def handle_rate(user_id, product_id, rating):
    """Handle rating action by updating the ratings table."""
    query = """
        INSERT INTO ratings (user_id, product_id, rating)
        VALUES (%s, %s, %s)
        ON DUPLICATE KEY UPDATE rating = %s
    """
    with engine.connect() as conn:
        conn.execute(query, (user_id, product_id, rating, rating))
    logging.info(f"Updated ratings table for user {user_id}, product {product_id} with rating {rating}.")

def handle_view(user_id, product_id):
    """Handle view action by logging the view in the views table."""
    query = "INSERT INTO views (user_id, product_id, timestamp) VALUES (%s, %s, NOW())"
    with engine.connect() as conn:
        conn.execute(query, (user_id, product_id))
    logging.info(f"Logged view for user {user_id}, product {product_id}.")

def handle_purchase(user_id, product_id):
    """Handle purchase action."""
    query = "INSERT INTO purchase_log (user_id, product_id, timestamp) VALUES (%s, %s, NOW())"
    with engine.connect() as conn:
        conn.execute(query, (user_id, product_id))
    logging.info(f"Logged purchase for user {user_id}, product {product_id}.")

def generate_recommendations(user_id, product_id):
    """Generate recommendations using a dataset combining multiple signals."""
    try:
        # Step 1: Load interaction data
        query = """
        SELECT user_id, product_id,
               SUM(rating * 1) + COUNT(view_id) * 0.2 + COUNT(purchase_id) * 5 AS interaction_score
        FROM (
            SELECT user_id, product_id, rating, NULL AS view_id, NULL AS purchase_id FROM ratings
            UNION ALL
            SELECT user_id, product_id, NULL AS rating, id AS view_id, NULL AS purchase_id FROM views
            UNION ALL
            SELECT user_id, product_id, NULL AS rating, NULL AS view_id, id AS purchase_id FROM purchase_log
        ) interactions
        GROUP BY user_id, product_id;
        """
        interactions_df = pd.read_sql(query, con=engine)
        logging.info("Loaded interaction data.")

        # Step 2: Prepare data for training
        X = interactions_df[['user_id', 'product_id']]
        y = interactions_df['interaction_score']
        logging.info("Prepared training data.")

        # Step 3: Train the CatBoost model
        model = CatBoostClassifier(iterations=100, depth=6, learning_rate=0.1, verbose=False)
        train_pool = Pool(data=X, label=y)
        model.fit(train_pool)
        logging.info("Model training completed.")

        # Step 4: Generate recommendations
        products_query = "SELECT id FROM products WHERE id != %s"
        products = pd.read_sql(products_query, con=engine, params=(product_id,))
        recommendation_candidates = pd.DataFrame({'user_id': [user_id] * len(products), 'product_id': products['id']})

        # Ensure column alignment and predict scores
        candidate_pool = Pool(data=recommendation_candidates, feature_names=['user_id', 'product_id'])
        recommendation_candidates['predicted_score'] = model.predict_proba(candidate_pool)[:, 1]

        # Sort and select top 5 recommendations
        recommendations = recommendation_candidates.sort_values(by='predicted_score', ascending=False).head(5)
        logging.info("Generated recommendations.")

        # Step 5: Save recommendations to the database
        recommendations['timestamp'] = pd.Timestamp.now()
        recommendations = recommendations.astype({
            'user_id': int,
            'product_id': int,
            'predicted_score': float,
            'timestamp': 'datetime64[ns]'
        })

        recommendations[['user_id', 'product_id', 'predicted_score', 'timestamp']].to_sql(
            name='recommendations',
            con=engine,
            if_exists='append',
            index=False,
            method='multi'
        )
        logging.info("Recommendations saved successfully.")

        print("Recommendations successfully generated and saved!")

    except Exception as e:
        logging.error(f"An error occurred: {str(e)}")
        sys.exit(1)

def main(user_id, product_id, action):
    try:
        logging.info(f"Processing action '{action}' for user {user_id}, product {product_id}...")

        if action == "rate":
            # Simulate a rating of 4 (you can modify to accept dynamic ratings)
            handle_rate(user_id, product_id, rating=4)
        elif action == "view":
            handle_view(user_id, product_id)
        elif action == "purchase":
            handle_purchase(user_id, product_id)
        else:
            logging.warning(f"Unknown action '{action}'. Skipping.")

        # Generate recommendations after processing the action
        generate_recommendations(user_id, product_id)

    except Exception as e:
        logging.error(f"An error occurred: {str(e)}")
        sys.exit(1)

if __name__ == "__main__":
    if len(sys.argv) != 4:
        logging.error("Invalid arguments. Usage: python recommendation_script.py <user_id> <product_id> <action>")
        sys.exit(1)

    # Extract arguments
    user_id = int(sys.argv[1])
    product_id = int(sys.argv[2])
    action = sys.argv[3]

    # Run the main function
    main(user_id, product_id, action)
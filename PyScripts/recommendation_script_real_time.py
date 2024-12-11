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

# Script entry point
def main(user_id, product_id, action):
    try:
        ## logging.info("Starting recommendation script...")
        
        # Step 1: Load ratings data
        query = "SELECT user_id, product_id, rating FROM ratings"
        ratings_df = pd.read_sql(query, con=engine)
        logging.info("Loaded ratings data.")

        # Optional Visualization (for debugging)
        ## logging.info("Visualizing data distribution...")
        print(ratings_df['rating'].value_counts())

        # Step 2: Prepare data for training
        X = ratings_df[['user_id', 'product_id']]
        y = ratings_df['rating']
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

        # Predict probabilities for the recommendation candidates
        recommendations = recommendation_candidates.copy()
        recommendations['predicted_score'] = model.predict_proba(recommendation_candidates)[:, 1]
        recommendations = recommendations.sort_values(by='predicted_score', ascending=False).head(5)
        logging.info("Generated recommendations.")

        # Step 5: Save recommendations to the database
        recommendations['timestamp'] = pd.Timestamp.now()
        recommendations.to_sql('recommendations', con=engine, if_exists='append', index=False)
        logging.info("Recommendations saved to database.")

        print("Recommendations successfully generated and saved!")

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
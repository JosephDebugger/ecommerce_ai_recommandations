import sys
import mysql.connector
import pandas as pd
from catboost import CatBoostClassifier

# Command-line arguments
user_id = int(sys.argv[1])
product_id = int(sys.argv[2])
action = sys.argv[3]



# Connect to the database
db_config = {
    "host": "localhost",
    "user": "root",
    "password": "",
    "database": "e_shop"
}
connection = mysql.connector.connect(**db_config)

# Load product and user data
query = """
SELECT p.category_id, p.brand_id, p.price, p.sale_count, r.rating
FROM products p
LEFT JOIN ratings r ON p.id = r.product_id AND r.user_id = %s
"""
df = pd.read_sql(query, connection, params=[user_id])

# Add features for training/prediction
df['is_popular'] = (df['sale_count'] > df['sale_count'].median()).astype(int)
df['has_high_views'] = (df['sale_count'] > df['sale_count'].mean()).astype(int)

# Prepare data for prediction
features = df[['category_id', 'brand_id', 'price', 'is_popular', 'has_high_views']]

# Load pre-trained model
model = CatBoostClassifier()
model.load_model('/storeModel/saved_model.cbm')

# Predict recommendations
df['prediction'] = model.predict(features)

# Filter products with high prediction scores
recommended_products = df[df['prediction'] == 1]['product_id'].tolist()

# Update the database with new recommendations
cursor = connection.cursor()
cursor.execute("DELETE FROM recommendations WHERE user_id = %s", (user_id,))
recommendation_data = [(user_id, prod_id) for prod_id in recommended_products]
cursor.executemany("INSERT INTO recommendations (user_id, product_id) VALUES (%s, %s)", recommendation_data)
connection.commit()

cursor.close()
connection.close()
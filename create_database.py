import sqlite3

# Connect to the database (or create it)
con = sqlite3.connect('users1.db')

# Create a table for storing user info
con.execute('''
CREATE TABLE users1 (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL
)
''')
con.close()

print("Database created successfully!")

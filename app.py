from flask import Flask, render_template, request, redirect
import sqlite3

app = Flask(__name__)

# Route to render the registration page
@app.route('/register', methods=['GET', 'POST'])
def register():
    if request.method == 'POST':
        # Get form data
        username = request.form['username']
        password = request.form['password']

        # Insert data into the database
        with sqlite3.connect('users.db') as con:
            cur = con.cursor()
            cur.execute("INSERT INTO users (username, password) VALUES (?, ?)", (username, password))
            con.commit()

        return "Registration successful!"

    # Render the registration HTML page (frontend)
    return render_template('registration.html')

if __name__ == '__main__':
    app.run(debug=True)

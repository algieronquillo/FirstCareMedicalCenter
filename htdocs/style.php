<style>
/* General Reset */
* {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styles */
body {
    margin: 0;
    padding: 0;
    background: linear-gradient(to bottom right, #f0f8ff, #e6eef8); /* Gradient background for depth */
    color: #2c3e50; /* Dark text for readability */
    line-height: 1.6;
    font-size: 16px;
}

/* Header Section */
header {
    background: #34495e; /* Modern dark blue */
    color: #ecf0f1;
    padding: 20px 0;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

header h1 {
    font-size: 2.5rem;
    letter-spacing: 1.5px;
    margin-bottom: 10px;
}

header p {
    font-size: 1.1rem;
    margin-top: 5px;
}

/* Navigation Menu */
nav {
    background: #2c3e50;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
    padding: 10px 0;
}

nav li {
    margin: 0 15px;
}

nav a {
    color: #ecf0f1;
    text-decoration: none;
    font-size: 1rem;
    font-weight: bold;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center; /* Ensures perfect alignment */
}

nav a:hover {
    background: #3498db;
    color: #ffffff;
    transform: scale(1.05); /* Slight scale effect for better interactivity */
}

/* Main Content Section */
.content {
    padding: 20px;
    margin: 20px auto;
    max-width: 90%;
    background: rgba(255, 255, 255, 0.9);
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.content h2 {
    font-size: 2rem;
    color: #34495e;
    margin-bottom: 15px;
}

.content p {
    font-size: 1rem;
    color: #7f8c8d;
    max-width: 800px;
    margin: 0 auto;
}

/* Table Styles */
table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    background: #ffffff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

th, td {
    padding: 12px 20px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background: #2c3e50;
    color: #ffffff;
    text-transform: uppercase;
    font-weight: bold;
    font-size: 0.9rem;
}

tr:nth-child(even) {
    background: #f9f9f9;
}

tr:hover {
    background: #f1faff;
}

/* Button Styles */
button, .delete-button {
    padding: 10px 20px;
    font-size: 0.9rem;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
    display: flex;
    align-items: center;
    justify-content: center; /* Ensures text stays aligned perfectly */
}

button {
    background: #27ae60;
    color: #ffffff;
}

button:hover {
    background: #1e8449;
    transform: scale(1.05);
}

.delete-button {
    background: #e74c3c;
    color: #ffffff;
}

.delete-button:hover {
    background: #c0392b;
    transform: scale(1.05);
}

/* Form Styles */
form {
    max-width: 500px;
    margin: 20px auto;
    padding: 20px;
    background: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

form input, form select, form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

form input:focus, form select:focus, form textarea:focus {
    outline: none;
    border-color: #3498db;
}

/* Footer */
footer {
    margin-top: 20px;
    background: #34495e;
    color: #ecf0f1;
    text-align: center;
    padding: 10px 0;
    font-size: 0.9rem;
}
</style>

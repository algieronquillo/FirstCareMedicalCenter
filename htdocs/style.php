<style>
* {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    margin: 20px;
    background-color: #f4f8fb; /* Light, soft background for a calming effect */
    color: #333; /* Darker text for readability */
}

/* Header and Navigation */
header {
    background-color: #2a4d69;
    color: #fff;
    padding: 20px;
    text-align: center;
}

  h1 {
    font-size: 36px;
    color: ; 
    margin-bottom: 0.5rem;
    text-align: center;
    padding: 10px 0;
    padding: 14px 16px;

}

nav {
    background-color: 24563a;
    overflow: hidden;
    padding: 10px 0;
}

nav ul {
    list-style: none;
    display: flex;
    justify-content: center;
}

nav li {
    margin: 0 20px;
}

nav a {
    color: #fff;
    text-decoration: none;
    font-size: 16px;
    padding: 10px 15px;
    display: inline-block;
}

nav a:hover {
    background-color: #5dade2; /* Slightly lighter blue on hover */
    color: #fff;
    border-radius: 5px;
}

/* Main Content Styles */
h2 {
    color: white;
    font-size: 28px;
    margin-bottom: 1rem;
}

p {
    margin-bottom: 1rem;
    font-size: 16px;
    line-height: 1.6;
}

/* Table Styles */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15); /* Subtle shadow */
    background-color: #ffffff;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
    font-size: 15px;
}

th {
    background-color: 24563a; /* Medical blue */
    color: #ffffff;
    text-transform: uppercase;
    font-weight: bold;
}

tr:nth-child(even) {
    background-color: #f9f9f9; /* Alternating row color */
}

tr:hover {
    background-color: #eaf4ff; /* Light blue on hover */
}

/* General Button Styles */
button, .delete-button {
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
    color: #ffffff;
    transition: background-color 0.3s ease;
}

/* Action Button (Green) */
button {
    background-color: #28a745; /* Green for positive actions */
}

button:hover {
    background-color: #218838; /* Darker green on hover */
}

/* Delete Button (Red) */
.delete-button {
    background-color: #dc3545; /* Red for delete actions */
}

.delete-button:hover {
    background-color: #c82333; /* Darker red on hover */
}


/* Delete Button */
.delete-button {
    background-color: #dc3545; /* Red for delete button */
    color: white;
}

.delete-button:hover {
    background-color: #c82333; /* Darker red on hover */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15); /* Soft shadow on hover */
}

/* Forms */
form {
    max-width: 600px;
    margin: 20px auto;
    padding: 10px;
}
</style>
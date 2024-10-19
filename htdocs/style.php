<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personnel</title>
    
       <style>
    * {
        font-family: Arial, sans-serif;
    }
    
    nav {
        text-align: center; /* Center the nav */
        background-color: #007BFF;
        overflow: hidden;
        margin: 0;
        padding: 0;

    }

    nav ul {
        list-style-type: none; /* Remove default list styling */
    padding: 0; /* Remove padding */
    margin: 0; /* Remove margin */
        list-style: none;
        margin: 0;
        padding: 0;
        text-align: center;
    }

    nav li {
        display: inline; /* Display list items inline */
        margin: 0 15px; /* Add space between items */
        
        float: left;
    }

    nav a {
        display: block;
        color: white;
        text-align: center;
        padding: 10px 10px;
        text-decoration: none;
    }

    nav a:hover {
        background-color: #8dd9f7; /* Red on hover */
        color: white; /* Change color to white */
    }

    body {
        margin: 20px;
        background-color: #f9f9f9; /* Light gray for a soothing effect */
    }
    
    table {
        width: 50%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: #ffffff; /* White for a clean look */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
    }
    
    th, td {
        border: 1px solid #dddddd; /* Light border */
        text-align: left;
        padding: 12px;
        font-size: 14px; /* Slightly smaller font for better readability */
    }
    
    th {
        background-color: #007BFF; /* Medical blue */
        color: white;
        text-transform: uppercase; /* Uppercase for a professional look */
        font-weight: bold; /* Bold for emphasis */
    }
    
    tr:nth-child(even) {
        background-color: light gray; /* Light gray for alternating rows */
    }
    
    tr:hover {
        background-color: #e0f7fa; /* Light cyan on hover */
    }
    
    pre {
        background-color: #f8f9fa; /* Very light gray */
        padding: 15px;
        border: 1px solid #ccc;
        overflow-x: auto;
    }
    
    /* Optional: Button styles for a more medical feel */
    button {
        background-color: #28a745; /* Green button for actions */
        color: red;
        border: none;
        padding: 10px 15px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 4px; /* Rounded corners */
        transition: background-color 0.3s ease; /* Smooth transition */
    }
    
    button:hover {
        background-color: red; 
    }
    h1{
        color: #218838;
    }


.delete-button {
    display: inline-block;
    padding: 10px 20px;
    background-color: red; /* Red background */
    color: red; /* White text */
    text-decoration: none; /* No underline */
    border-radius: 5px; /* Rounded corners */
    border: none; /* No border */
}

.delete-button:hover {
    background-color: darkred; /* Darker red on hover */
    
}

</style>
</head>
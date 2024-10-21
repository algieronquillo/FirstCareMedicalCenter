 
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
        text-align: center;
        width: 35%;
        border-collapse: collapse;
        margin-bottom: 20px;
        background-color: #ffffff; /* White for a clean look */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow for depth */
    }
    
    th, td {
        text-align: center;
        border: 1px solid #dddddd; /* Light border */
        text-align: left;
        padding: 15px;
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
        background-color: #aba9a9; /* Light cyan on hover */
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




body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

header {
    background: #35424a;
    color: white;
    padding: 20px;
    text-align: center; /* Center header text */
}

.container {
    display: flex; /* Use flexbox for layout */
}

nav {
    width: 200px; /* Set fixed width for the sidebar */
    background: #35424a;
    padding: 25px;
}

nav ul {
    list-style-type: none; /* Remove default list styling */
    padding: 0; /* Remove padding */
    margin: 0; /* Remove margin */
}

nav ul li {
    margin-bottom: 15px; /* Space between links */
    text-align: center; /* Center text within each list item */
}

nav ul li a {
    color: white;
    text-decoration: none;
    display: block; /* Make the link fill the area */
    padding: 15px; /* Add padding for better clickability */
    transition: background 0.3s; /* Smooth background transition */
}

nav ul li a:hover {
    background: #47525e; /* Change background on hover */
    border-radius: 5px; /* Rounded corners on hover */
}

main {
    padding: 25px;
    background: white;
    flex-grow: 1; /* Allow main content to grow */
    border-radius: 5px;
    margin-left: 20px; /* Space between nav and main content */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

footer {
    text-align: center;
    padding: 10px 0;
    background: #35424a;
    color: white;
    position: fixed;
    width: 100%;
    bottom: 0;
}

</style>
</head>
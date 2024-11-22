<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
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
            line-height: 1.2;
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
            background-color: #333;
            padding: 10px 0;
            display: flex;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.0);
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        .menu-item > a {
            color: #fff;
            text-decoration: none;
            font-size: 1.2em;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }

        .menu-item > a:hover {
            background-color: #555;
        }

        .submenu {
            display: none;
            position: absolute;
            background-color: #444;
            padding: 0;
            list-style: none;
        }

        .menu-item:hover .submenu {
            display: block;
        }

        .submenu li a {
            color: #fff;
            padding: 8px 15px;
            display: block;
            text-decoration: none;
            font-size: 1em;
        }

        .submenu li a:hover {
            background-color: #666;
        }

        /* Title styling adjustments */
        .title {
            text-align: center;
            font-family: 'Georgia', serif;
            font-size: 3.5em; /* Increase font size */
            color: #fff; /* White text for contrast */
            letter-spacing: 2px;
            font-weight: bold;
            margin-top: 50px;
            padding: 20px;
            background: linear-gradient(90deg, #6a994e, #6a994e); /* Gradient background for depth */
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0 4px 5px rgba(0, 0, 0, 0.8);
            transition: all 0.3s ease;
            text-transform: uppercase; /* Make the text more prominent */
        }

        .title:hover {
            color: #fff;
            background: linear-gradient(90deg, #6a994e, #6a994e);
            text-shadow: 0px 0px 10px rgb(0, 0, 0, 0.5), 0px 0px 0px rgba(05, 100, 0, 0.5);
            transform: translateY(-5px);
        }

        /* Image styling */
        .logo-container {
            text-align: center;
            margin-top: 20px;
        }

        .logo-container img {
            width: 300px;
            height: auto;
            display: block;
            margin: 0 auto;
            border: 2px solid #D4A373;
        }

        /* Upload form styling */
        .upload-form {
            text-align: center;
            margin-top: 20px;
        }

        .upload-form input[type="file"] {
            padding: 10px;
            font-size: 16px;
        }

        .success-message, .error-message {
            text-align: center;
            font-weight: bold;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
        }

        /* New styles for page structure */
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

        /* Button styles */
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
            justify-content: center;
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
    </style>
</head>
<body>



    <!-- Navigation Menu -->
    <nav>
        <ul class="menu">
            <li class="menu-item">
                <a href="home_page.php">Home</a>
            </li>
            <li class="menu-item">
                <a href="#">Personnel</a>
                <ul class="submenu">
                    <li><a href="personnel.php">View Personnel</a></li>
                    <li><a href="insert_personnel.php">Insert Personnel</a></li>
                    <li><a href="assign_personnel.php">Assign Personnel</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#">Patients</a>
                <ul class="submenu">
                   
                    
                    <li><a href="admit_patients.php">Admit Patients</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#">Location</a>
                <ul class="submenu">
                    <li><a href="location.php">View Location</a></li>
                </ul>
            </li>
            <li class="menu-item">
                <a href="#">Gallery</a>
                <ul class="submenu">
                    <li><a href="upload_image.php">Upload Images</a></li>
                    <li><a href="gallery.php">View Gallery</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- Title for First Care Medical -->
    <center><div class="title">First Care Medical Center</div></center>
</body>
</html>

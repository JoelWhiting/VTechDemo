<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Material Data</title>
    <link rel="stylesheet" href="StylingForMockUp.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background: linear-gradient(90deg, #660000, #ff6600);
            color: white;
            padding: 20px;
            text-align: center;
        }

        nav ul {
            display: flex;
            justify-content: center;
            list-style-type: none;
            background: linear-gradient(90deg, #ff6600, #660000);
            margin: 0;
            padding: 10px 0;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }

        form {
            width: 100%;
            max-width: 600px;
            display: flex;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: calc(100% - 110px);
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px 0 0 4px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
        }

        .results {
            width: 100%;
            max-width: 600px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .results h2 {
            color: #660000;
            text-align: center;
            margin-bottom: 20px;
        }

        .result-item {
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 15px;
            background-color: #f9f9f9;
        }

        .result-title {
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            text-transform: uppercase;
        }

        .result-text {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #ddd;
        }

        .result-text:last-child {
            border-bottom: none;
        }

        .result-key {
            font-weight: bold;
            color: #555;
        }

        .result-value {
            color: #333;
        }

        footer {
            background: linear-gradient(90deg, #660000, #ff6600);
            color: white;
            padding: 10px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        .search-key {
            width: 100%;
            max-width: 600px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .search-key h2 {
            margin-top: 0;
            color: #660000;
            text-align: center;
        }

        .search-key table {
            width: 100%;
            border-collapse: collapse;
        }

        .search-key th, .search-key td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .search-key th {
            background-color: #f4f4f9;
            color: #333;
        }
    </style>
</head>
<body>
    <header>
        <h1>Virginia Tech Additive Manufacturing Research Site</h1>
    </header>

    <nav>
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="upload.php">Upload</a></li>
            <li><a href="SearchVT.php">Search</a></li>
            <li><a href="Contact.php">Contact Us</a></li>
        </ul>
    </nav>

    <main>
        <form action="SearchVT.php" method="GET">
            <input type="text" name="query" placeholder="Search by ID..." required>
            <input type="submit" value="Search">
        </form>

        <?php
        $servername = "localhost";
        $username = "Jwhi2308";
        $password = "1234";
        $dbname = "material_data";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        if (!empty($_GET['query'])) {
            $query = $_GET['query'];
            $safe_query = $conn->real_escape_string($query);
        
            $sql = "SELECT * FROM mats WHERE id = '$safe_query'";
        
            $result = $conn->query($sql);
        
            echo '<div class="results">';
            echo '<h2>Search Results</h2>';
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="result-item">';
                    echo '<div class="result-title">Material: ' . htmlspecialchars($row['material']) . '</div>';
                    foreach ($row as $key => $value) {
                        echo '<div class="result-text">';
                        echo '<span class="result-key">' . htmlspecialchars(ucwords(str_replace("_", " ", $key))) . ':</span>';
                        echo '<span class="result-value">' . htmlspecialchars($value) . '</span>';
                        echo '</div>';
                    }
                    if (!empty($row['uploaded_file'])) {
                        $file_path = htmlspecialchars($row['uploaded_file']);
                        echo '<div class="result-text">';
                        echo '<span class="result-key">Download:</span>';
                        echo '<span class="result-value"><a href="' . $file_path . '" download="' . basename($file_path) . '" style="color: #4CAF50;">Click to Download</a></span>';
                        echo '</div>';
                    }
                    if (!empty($row['file_preview'])) {
                        $preview_path = htmlspecialchars($row['file_preview']);
                        echo '<div class="result-text">';
                        echo '<span class="result-key">File Preview:</span>';
                        echo '<span class="result-value"><img src="' . $preview_path . '" alt="File Preview" style="max-width: 200px; max-height: 200px; border: 1px solid #ddd;"></span>';
                        echo '</div>';
                    }
                    echo '</div>';
                }
            } else {
                echo '<p>No results found for "' . htmlspecialchars($query) . '".</p>';
            }
            echo '</div>';
        }
        
        $sql = "SELECT id FROM mats LIMIT 50";
        $result = $conn->query($sql);
        
        echo '<div class="search-key">';
        echo '<h2>Search Key</h2>';
        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>ID</th></tr>';
            while ($row = $result->fetch_assoc()) {
                echo '<tr><td>' . htmlspecialchars($row['id']) . '</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>No data available.</p>';
        }
        echo '</div>';
        
        $conn->close();
        
        ?>
    </main>

    <footer>
        <p>&copy; 2024 Virginia Tech</p>
    </footer>
</body>
</html>

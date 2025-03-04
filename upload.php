<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Insert Material Data</title>
    <link rel="stylesheet" href="StylingForMockUp.css">
    <style>
        /* General Styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            color: #333;
        }

        header {
            background: linear-gradient(90deg, #660000, #ff6600);
            color: white;
            padding: 20px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
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
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #f4f4f9;
        }

        main {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 30px;
        }

        h2 {
            color: #660000;
            margin-bottom: 20px;
        }

        form {
            max-width: 700px;
            width: 100%;
            background-color: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"], input[type="number"], input[type="file"], input[type="radio"], select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"], input[type="button"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #45a049;
        }

        .radio-group label {
            margin-right: 15px;
        }

        footer {
            background: linear-gradient(90deg, #660000, #ff6600);
            color: white;
            padding: 15px;
            text-align: center;
            position: relative;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }

        .success-msg, .error-msg {
            padding: 15px;
            border-radius: 5px;
            margin: 20px auto;
            max-width: 700px;
            text-align: center;
            font-weight: bold;
            font-size: 14px;
        }

        .success-msg {
            color: #155724;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
        }

        .error-msg {
            color: #721c24;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
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
    <h2>Insert New Material Data</h2>

    <form id="materialForm" action="" method="POST" enctype="multipart/form-data">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required>

        <label for="material">Material:</label>
        <input type="text" id="material" name="material" required>

        <label for="printer_manufacturer">Printer Manufacturer:</label>
        <input type="text" id="printer_manufacturer" name="printer_manufacturer" required>

        <label for="printer_type">Printer Type:</label>
        <input type="text" id="printer_type" name="printer_type" required>

        <label for="uploaded_file">Upload File:</label>
        <input type="file" id="uploaded_file" name="uploaded_file" required>

        <label for="file_preview">Upload File Screenshot:</label>
        <input type="file" id="file_preview" name="file_preview" required>

        <label for="powder_size">Powder Size:</label>
        <input type="number" step="0.01" id="powder_size" name="powder_size">

        <label for="contour_laser_scan_speed">Contour Laser Scan Speed:</label>
        <input type="number" step="0.01" id="contour_laser_scan_speed" name="contour_laser_scan_speed">

        <label for="contour_laser_power">Contour Laser Power:</label>
        <input type="number" step="0.01" id="contour_laser_power" name="contour_laser_power">

        <label for="hatch_spacing">Hatch Spacing:</label>
        <input type="number" step="0.01" id="hatch_spacing" name="hatch_spacing">

        <label for="build_orientation">Build Orientation:</label>
        <input type="number" step="0.01" id="build_orientation" name="build_orientation">

        <label for="fov_x">Field of View (X):</label>
        <input type="number" step="0.01" id="fov_x" name="fov_x">

        <label for="fov_y">Field of View (Y):</label>
        <input type="number" step="0.01" id="fov_y" name="fov_y">

        <label for="lateral_resolution">Lateral Resolution:</label>
        <input type="number" step="0.01" id="lateral_resolution" name="lateral_resolution">

        <label for="vertical_resolution">Vertical Resolution:</label>
        <input type="number" step="0.01" id="vertical_resolution" name="vertical_resolution">

        <label for="layer_thickness">Layer Thickness:</label>
        <input type="number" step="0.01" id="layer_thickness" name="layer_thickness">

        <label for="magnification">Magnification:</label>
        <input type="number" step="0.01" id="magnification" name="magnification">

        <label for="heat_treatment">Heat Treatment:</label><br>
        <div class="radio-group">
            <input type="radio" id="heat_yes" name="heat_treatment" value="Yes" required>
            <label for="heat_yes">Yes</label>
            <input type="radio" id="heat_no" name="heat_treatment" value="No" required>
            <label for="heat_no">No</label>
        </div><br>

        <input type="submit" name="submitted" value="Insert Material Data">
    </form>


    <?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitted'])) {
    if (!isset($_SESSION['form_submitted']) || $_SESSION['form_submitted'] === false) {
        $servername = "localhost";
        $username = "Jwhi2308";
        $password = "1234";
        $dbname = "material_data";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            echo "<div class='error-msg'>Connection failed: " . $conn->connect_error . "</div>";
            exit();
        }

        // Sanitize and handle form data
        $id = $conn->real_escape_string($_POST['id']);
        $material = $conn->real_escape_string($_POST['material']);
        $printer_manufacturer = $conn->real_escape_string($_POST['printer_manufacturer']);
        $printer_type = $conn->real_escape_string($_POST['printer_type']);
        $powder_size = $conn->real_escape_string($_POST['powder_size']);
        $contour_laser_scan_speed = $conn->real_escape_string($_POST['contour_laser_scan_speed']);
        $contour_laser_power = $conn->real_escape_string($_POST['contour_laser_power']);
        $hatch_spacing = $conn->real_escape_string($_POST['hatch_spacing']);
        $build_orientation = $conn->real_escape_string($_POST['build_orientation']);
        $fov_x = $conn->real_escape_string($_POST['fov_x']);
        $fov_y = $conn->real_escape_string($_POST['fov_y']);
        $lateral_resolution = $conn->real_escape_string($_POST['lateral_resolution']);
        $vertical_resolution = $conn->real_escape_string($_POST['vertical_resolution']);
        $layer_thickness = $conn->real_escape_string($_POST['layer_thickness']);
        $magnification = $conn->real_escape_string($_POST['magnification']);
        $heat_treatment = $conn->real_escape_string($_POST['heat_treatment']);

        // Check if ID already exists
        $check_sql = "SELECT id, uploaded_file FROM mats WHERE id = '$id'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            // Fetch the existing file path
            $existing_data = $result->fetch_assoc();
            $existing_file = $existing_data['uploaded_file'];

            echo "<div class='error-msg'>Error: A record with ID '$id' already exists. A file is already uploaded: <strong>" . basename($existing_file) . "</strong>. Please enter a unique ID.</div>";
        } else {
            $target_dir = "uploads/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }
            
            $uploaded_file = $target_dir . basename($_FILES["uploaded_file"]["name"]);
            if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $uploaded_file)) {
                echo "<div class='success-msg'>File uploaded successfully: " . htmlspecialchars(basename($_FILES["uploaded_file"]["name"])) . "</div>";
            } else {
                echo "<div class='error-msg'>Error uploading file.</div>";
            }

            $file_preview = $target_dir . basename($_FILES["file_preview"]["name"]);
            if (move_uploaded_file($_FILES["file_preview"]["tmp_name"], $file_preview)) {
                echo "<div class='success-msg'>File preview uploaded successfully: " . htmlspecialchars(basename($_FILES["file_preview"]["name"])) . "</div>";
            } else {
                echo "<div class='error-msg'>Error uploading file preview.</div>";
            }

            // Insert data into database
            $sql = "INSERT INTO mats (id, material, printer_manufacturer, printer_type, uploaded_file, file_preview, powder_size, contour_laser_scan_speed, contour_laser_power, hatch_spacing, build_orientation, fov_x, fov_y, lateral_resolution, vertical_resolution, layer_thickness, magnification, heat_treatment) 
                    VALUES ('$id', '$material', '$printer_manufacturer', '$printer_type', '$uploaded_file', '$file_preview', '$powder_size', '$contour_laser_scan_speed', '$contour_laser_power', '$hatch_spacing', '$build_orientation', '$fov_x', '$fov_y', '$lateral_resolution', '$vertical_resolution', '$layer_thickness', '$magnification', '$heat_treatment')";

            if ($conn->query($sql) === TRUE) {
                $_SESSION['form_submitted'] = true; // Mark form as submitted
                echo "<div class='success-msg'>New record created successfully.</div>";

                // Redirect to prevent resubmission on refresh
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            } else {
                echo "<div class='error-msg'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        }
        $conn->close();
    }
}

// Reset session to allow new submissions after refresh
$_SESSION['form_submitted'] = false;
?>





</main>

<footer>
    <p>&copy; 2024 Virginia Tech</p>
</footer>

</body>
</html>

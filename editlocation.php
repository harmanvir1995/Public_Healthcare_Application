<!DOCTYPE html>
<html>
<head>
	<title>Edit Location Data</title>
	<style>
    body {
        background-color: #f2f2f2;
        font-family: Arial, sans-serif;
    }

    h1 {
        color: #007bff;
        text-align: center;
        margin-top: 20px;
    }

    h2 {
        color: #007bff;
        margin-top: 20px;
    }

    h3 {
        margin-top: 20px;
        margin-left: 20px;
    }

    fieldset {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

    legend {
        font-weight: bold;
    }

    form {
        display: flex;
        flex-wrap: wrap;
    }

    label {
        width: 150px;
        font-weight: bold;
        margin-bottom: 10px;
    }

    input[type="text"],
    input[type="date"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
        margin-bottom: 20px;
    }

    input[type="submit"],
    input[type="reset"] {
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        margin-top: 10px;
        margin-bottom: 20px;
        cursor: pointer;
    }

    input[type="submit"]:hover,
    input[type="reset"]:hover {
        background-color: #0069d9;
    }
    </style>
</head>
<body>
	<h1>Location</h1>
    <h3><a href="index.php">Back to Home Page</a></h3>
    <h2>Edit Data in Location Table</h2>
	<fieldset>
	<legend>Enter Data to Edit</legend>
	<form action="editlocation.php" method="post">
		<label for="postal_code">Postal Code:</label>
		<input type="text" id="postal_code" name="postal_code" required maxlength="7"><br><br>

		<label for="city">City:</label>
		<input type="text" id="city" name="city" required><br><br>

		<label for="province">Province:</label>
		<input type="text" id="province" name="province" required maxlength="2"><br><br>

		<input type="submit" name = "Submit" value="Submit">
		<input type="reset" value="Reset">
	</form>
</fieldset>
</body>
</html>


<?php
    if (isset($_POST['Submit'])) {
        $servername = "xac353.encs.concordia.ca";
        $username = "xac353_4";
        $password = "COMP2023";
        $db_name = "xac353_4";
        // Get the form data
		$postal_code = $_POST['postal_code'];
		$city = $_POST['city'];
		$province = $_POST['province'];

        // Insert the data into the "location" table
		$sql = "update location set postal_code = '$postal_code', city = '$city', province = '$province'";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db_name);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
        // Perform query
        if ($result = $conn -> query($sql)) {
          echo "Successfully edited tuple in Locations table";
        } else {
          echo "Unsuccessful edit";
        }
        }
?>
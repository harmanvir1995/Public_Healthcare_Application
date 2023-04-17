<!DOCTYPE html>
<html>
<head>
	<title>Edit Infected Data</title>
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
    <h1>Infected</h1>
    <h3><a href="index.php">Back to Home Page</a></h3>
    <h2>Edit Data in Infected Table</h2>
    <fieldset>
    <legend>Enter Data to Store</legend>
	<form action="editInfected.php" method="post">
		<label for="inf_id">Infected ID:</label>
		<input type="text" id="inf_id" name="inf_id" required><br><br>

		<label for="medicare_number">Medicare Number:</label>
		<input type="text" id="medicare_number" name="medicare_number" required><br><br>

		<label for="date">Date:</label>
		<input type="date" id="date" name="date" required><br><br>

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
        $inf_id = $_POST['inf_id'];
        $medicare_number = $_POST['medicare_number'];
        $date = $_POST['date'];
        
        // Insert the data into the "infected" table
        $sql = "update infected set inf_id ='$inf_id', medicare_number = '$medicare_number', date = '$date'";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db_name);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
        // Perform query
        if ($result = $conn -> query($sql)) {
          echo "Successfully edited tuple in Facilities table";
        } else {
          echo "Unsuccessful insertion";
        }
        }
?>
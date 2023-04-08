<!DOCTYPE html>
<html>
<head>
	<title>Insert Infection Data</title>
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
    <h1>Infections</h1>
    <h3><a href="index.php">Back to Home Page</a></h3>
    <h2>Insert Data in Infections Table</h2>
    <fieldset>
    <legend>Enter Data to Store</legend>
	<form action="infectionsNewEntry.php" method="post">
		<label for="inf_id">Infection ID:</label>
		<input type="text" id="inf_id" name="inf_id" required><br><br>

		<label for="type">Type:</label>
		<input type="text" id="type" name="type" required><br><br>

		<input type="submit" name = "Submit" value="Submit">
        <input type="reset" value="Reset">
	</form>
    <fieldset>
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
        $type = $_POST['type'];
        
        // Insert the data into the "infections" table
        $sql = "INSERT INTO infections (inf_id, type)
        VALUES ('$inf_id', '$type')";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db_name);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
        // Perform query
        if ($result = $conn -> query($sql)) {
          echo "Successfully added tuple into Facilities table";
        } else {
          echo "Unsuccessful insertion";
        }
        }
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Facilities Create New Entry</title>
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
    <h1>Facilities</h1>
    <h3><a href="index.php">Back to Home Page</a></h3>
    <h2>Insert Facilities Data</h2>
    <fieldset>
        <legend>Enter Data to Store</legend>
        <form action="facilitiesNewEntry.php" method="post">
            <label for="facility_id">Facility ID:</label><br>
            <input type="text" id="facility_id" name="facility_id"><br>
            <label for="name">Name:</label><br>
            <input type="text" id="name" name="name"><br>
            <label for="address">Address:</label><br>
            <input type="text" id="address" name="address"><br>
            <label for="postal_code">Postal Code:</label><br>
            <input type="text" id="postal_code" name="postal_code"><br>
            <label for="phone">Phone:</label><br>
            <input type="text" id="phone" name="phone"><br>
            <label for="web_address">Web Address:</label><br>
            <input type="text" id="web_address" name="web_address"><br>
            <label for="type">Type:</label><br>
            <input type="text" id="type" name="type"><br>
            <label for="capacity">Capacity:</label><br>
            <input type="number" id="capacity" name="capacity"><br><br>
            <input type="submit" value="Submit" name="Submit" id="Submit"><br>
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
$facility_id = $_POST['facility_id'];
$name = $_POST['name'];
$address = $_POST['address'];
$postal_code = $_POST['postal_code'];
$phone = $_POST['phone'];
$web_address = $_POST['web_address'];
$type = $_POST['type'];
$capacity = $_POST['capacity'];

// Concatenate values into SQL query
$query = "INSERT INTO facilities (facility_id, name, address, postal_code, phone_number, web_address, type, capacity) VALUES ('$facility_id', '$name', '$address', '$postal_code', '$phone', '$web_address', '$type', $capacity);";

// Create connection
$conn = new mysqli($servername, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";
// Perform query
if ($result = $conn -> query($query)) {
  echo "Successfully added tuple into Facilities table";
} else {
  echo "Unsuccessful insertion";
}
}
 

?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit Schedule Data</title>
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
    <h1>Schedule</h1>
    <h3><a href="index.php">Back to Home Page</a></h3>
    <h2>Edit Data in Schedule Table</h2>
    <fieldset>
        <legend>Enter Data</legend>
        <form action="newschedule.php" method="post">
            <label for="medicare_number">Medicare Number:</label>
            <input type="text" id="medicare_number" name="medicare_number" required maxlength="10"><br><br>

            <label for="facility_id">Facility ID:</label>
            <input type="text" id="facility_id" name="facility_id" required><br><br>

            <label for="day">Day:</label>
            <input type="date" id="day" name="day" required><br><br>

            <label for="start_time">Start Time:</label>
            <input type="time" id="start_time" name="start_time" required><br><br>

            <label for="end_time">End Time:</label>
            <input type="time" id="end_time" name="end_time" required><br><br>

            <input type="submit" name="Submit" value="Submit">
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
       // Retrieve data from form
        $medicare_number = $_POST['medicare_number'];
        $facility_id = $_POST['facility_id'];
        $day = $_POST['day'];
        $start_time = $_POST['start_time'];
        $end_time = $_POST['end_time'];

       // Prepare SQL statement
        $sql = "update schedule set medicare_number = '$medicare_number', facility_id ='$facility_id', day ='$day', start_time ='$start_time', end_time = '$end_time'";


        // Create connection
        $conn = new mysqli($servername, $username, $password, $db_name);
        
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully";
        // Perform query
        if ($result = $conn -> query($sql)) {
          echo "Successfully edited tuple in Scheduele table";
        } else {
          echo "Unsuccessful edit";
        }
        }
?>
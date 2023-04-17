<!DOCTYPE html>
<html>

<head>
    <title>Insert Schedule Data</title>
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
    <h1>Works at</h1>
    <h3><a href="index.php">Back to Home Page</a></h3>
    <h2>Insert Data in Works At Table</h2>
    <fieldset>
        <legend>Enter Data to Store</legend>
        <form action="worksAtNewEntry.php" method="post">
            <label for="facility_id">Facility ID:</label>
            <input type="text" id="facility_id" name="facility_id" required>
            <br><br>

            <label for="medicare_number">Medicare Number:</label>
            <input type="text" id="medicare_number" name="medicare_number" required>
            <br><br>

            <label for="start_date">Start Date (YYYY-MM-DD):</label>
            <input type="date" id="start_date" name="start_date" required>
            <br><br>

            <label for="end_date">End Date (YYYY-MM-DD):</label>
            <input type="date" id="end_date" name="end_date">
            <br><br>

            <label for="role">Role:</label>
            <input type="text" id="role" name="role" required>
            <br><br>
            <input type="submit" value="Submit" name = "Submit">
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
       // Get submitted data from the form
        $vac_id = $_POST['vac_id'];
        $medicare_number = $_POST['medicare_number'];
        $date = $_POST['date'];
        $dose_number = $_POST['dose_number'];

       // Prepare SQL statement
        $sql = "INSERT INTO vaccinated (vac_id, medicare_number, date, dose_number)
        VALUES ($medicare_number, $facility_id, $day, $start_time, $end_time)";


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
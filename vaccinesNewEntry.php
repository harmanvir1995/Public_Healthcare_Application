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
    <h1>Vaccinated</h1>
    <h3><a href="index.php">Back to Home Page</a></h3>
    <h2>Insert Data in Vaccinated Table</h2>
    <fieldset>
        <legend>Enter Data to Store</legend>
        <form action="vaccinesNewEntry.php" method="post">
        <label for="vac_id">Vaccination ID:</label>
        <input type="text" id="vac_id" name="vac_id" required>

        <label for="medicare_number">Medicare Number:</label>
        <input type="text" id="medicare_number" name="medicare_number" required>

        <label for="date">Date (YYYY-MM-DD):</label>
        <input type="date" id="date" name="date" required>

        <label for="dose_number">Dose Number:</label>
        <input type="number" id="dose_number" name="dose_number" required>
        <br/><br/>
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
        $sql = "INSERT INTO vaccines (vac_id, medicare_number, date, dose_number)
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
          echo "Successfully added tuple into Vaccines table";
        } else {
          echo "Unsuccessful insertion";
        }
        }
?>
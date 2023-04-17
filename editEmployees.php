<!DOCTYPE html>
<html>

<head>
    <title>Employee Editing</title>
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
    <h1>Employees</h1>
    <h3><a href="index.php">Back to Home Page</a></h3>
    <h2>Insert Employee Data</h2>
    <fieldset>
        <legend>Enter medicare number and new values for those you wish to edit</legend>
        <form action="employeesNewEntry.php" method="post">
            <label for="medicare_number">Medicare Number:</label>
            <input type="text" id="medicare_number" name="medicare_number" maxlength="10" required><br><br>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" maxlength="255" ><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" maxlength="255" ><br><br>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" ><br><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" maxlength="10" ><br><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" maxlength="255" ><br><br>

            <label for="postal_code">Postal Code:</label>
            <input type="text" id="postal_code" name="postal_code" maxlength="7" ><br><br>

            <label for="citizenship">Citizenship:</label>
            <input type="text" id="citizenship" name="citizenship" maxlength="255"><br><br>

            <label for="email_address">Email Address:</label>
            <input type="email" id="email_address" name="email_address" maxlength="255" ><br><br>

            <input type="submit" name="Submit" value="Submit" >
            <input type="reset" value="Reset">
        </form>
    </fieldset>
</body>

</html>

<?php
    if(isset($_POST['Submit'])){
        $servername = "xac353.encs.concordia.ca";
        $username = "xac353_4";
        $password = "COMP2023";
        $db_name = "xac353_4";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $db_name);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
    
        //get data from form
        $medicare_number = $_POST['medicare_number'];
        
        $first_name = $_POST['first_name'];
        if ($first_name.empty()) {
            $sql = "SELECT first_name from employees where medicare_number = '$medicare_number'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQL_ASSOC);
            $first_name = $result[0]['first_name'];
        }


        $last_name = $_POST['last_name'];
        if ($last_name.empty()) {
            $sql = "SELECT last_name from employees where medicare_number = '$medicare_number'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQL_ASSOC);
            $last_name = $result[0]['last_name'];
        }


        $date_of_birth = $_POST['date_of_birth'];
        if ($date_of_birth.empty()) {
            $sql = "SELECT date_of_birth from employees where medicare_number = '$medicare_number'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQL_ASSOC);
            $first_name = $result[0]['date_of_birth'];
        }

        $phone_number = $_POST['phone_number'];
        if ($phone_number.empty()) {
            $sql = "SELECT phone_number from employees where medicare_number = '$medicare_number'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQL_ASSOC);
            $first_name = $result[0]['phone_number'];
        }
        $address = $_POST['address'];
        if ($address.empty()) {
            $sql = "SELECT address from employees where medicare_number = '$medicare_number'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQL_ASSOC);
            $first_name = $result[0]['address'];
        }

        $postal_code = $_POST['postal_code'];
        if ($postal_code.empty()) {
            $sql = "SELECT postal_code from employees where medicare_number = '$medicare_number'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQL_ASSOC);
            $first_name = $result[0]['postal_code'];
        }
        $citizenship = $_POST['citizenship'];
        if ($citizenship.empty()) {
            $sql = "SELECT citizenship from employees where medicare_number = '$medicare_number'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQL_ASSOC);
            $first_name = $result[0]['citizenship'];
        }
        $email_address = $_POST['email_address'];
        if ($email_address.empty()) {
            $sql = "SELECT email_address from employees where medicare_number = '$medicare_number'";
            $result = mysqli_query($conn, $sql);
            $rows = mysqli_fetch_all($result, MYSQL_ASSOC);
            $first_name = $result[0]['email_address'];
        }


      
        // Update the data in the "employees" table
        $sql = "UPDATE EMPLOYEES 
        set first_name = '$first_name', last_name = '$last_name', date_of_birth = '$date_of_birth', phone_number = '$phone_number', address= '$address', postal_code ='$postal_code', citizenship = '$citizenship', email_address = '$email_address' WHERE medicare_number = '$medicare_number'";

        // Perform the SQL query.
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
?>
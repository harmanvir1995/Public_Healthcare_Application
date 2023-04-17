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
        <form action="editEmployees.php" method="post">
            <label for="medicare_number">Medicare Number:</label>
            <input type="text" id="medicare_number" name="medicare_number" maxlength="10" required><br><br>

            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" maxlength="255" required><br><br>

            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" maxlength="255" required><br><br>

            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required><br><br>

            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" maxlength="10" required><br><br>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" maxlength="255" required><br><br>

            <label for="postal_code">Postal Code:</label>
            <input type="text" id="postal_code" name="postal_code" maxlength="7" required><br><br>

            <label for="citizenship">Citizenship:</label>
            <input type="text" id="citizenship" name="citizenship" maxlength="255" required><br><br>

            <label for="email_address">Email Address:</label>
            <input type="email" id="email_address" name="email_address" maxlength="255" required><br><br>

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
        // if (empty($first_name)) {
        //     $sql = "SELECT first_name from employees where medicare_number = '$medicare_number'";
        //     $result = mysqli_query($conn, $sql);
        //     while ($row = mysql_fetch_assoc($result)) {
        //         $first_name = $row['first_name'];
        //     }
        // }


        $last_name = $_POST['last_name'];
        // if (empty($last_name)) {
        //     $sql = "SELECT last_name from employees where medicare_number = '$medicare_number'";
        //     $result = mysqli_query($conn, $sql);
        //     while ($row = mysql_fetch_assoc($result)) {
        //         $last_name = $row['last_name'];

        //     }

        // }


        $date_of_birth = $_POST['date_of_birth'];
        // if (empty($date_of_birth)) {
        //     $sql = "SELECT date_of_birth from employees where medicare_number = '$medicare_number'";
        //     $result = mysqli_query($conn, $sql);
        //     while ($row = mysql_fetch_assoc($result)) {
        //         $date_of_birth = $row['date_of_birth'];

        //     }
            

        // }

        $phone_number = $_POST['phone_number'];
        // if (empty($phone_number)) {
        //     $sql = "SELECT phone_number from employees where medicare_number = '$medicare_number'";
        //     $result = mysqli_query($conn, $sql);
        //     while ($row = mysql_fetch_assoc($result)) {
        //         $phone_number = $row['phone_number'];

        //     }

        // }
        $address = $_POST['address'];
        // if (empty($address)) {
        //     $sql = "SELECT address from employees where medicare_number = '$medicare_number'";
        //     $result = mysqli_query($conn, $sql);
        //     while ($row = mysql_fetch_assoc($result)) {
        //         $adress = $row['address'];

        //     }

        // }

        $postal_code = $_POST['postal_code'];
        // if (empty($postal_code)) {
        //     $sql = "SELECT postal_code from employees where medicare_number = '$medicare_number'";
        //     $result = mysqli_query($conn, $sql);
        //     while ($row = mysql_fetch_assoc($result)) {
        //         $postal_code = $row['postal_code'];

        //     }            

        // }
        $citizenship = $_POST['citizenship'];
        // if (empty($citizenship)) {
        //     $sql = "SELECT citizenship from employees where medicare_number = '$medicare_number'";
        //     $result = mysqli_query($conn, $sql);
        //     while ($row = mysql_fetch_assoc($result)) {
        //         $citizenship = $row['citizenship'];
        // }}

        $email_address = $_POST['email_address'];
        // if (empty($email_address)) {
        //     $sql = "SELECT email_address from employees where medicare_number = '$medicare_number'";
        //     while ($row = mysql_fetch_assoc($result)) {
        //         $email_address = $row['email_address'];
        //     }

        // }


      
        // Update the data in the "employees" table
        $sql = "UPDATE employees 
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
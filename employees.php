<!DOCTYPE html>
<html>
    <head>
        <title>Employees Table</title>
        <link rel="stylesheet" type="text/css" href="cssCommon.css">
        <style>
            /* CSS for the table */
            table {
                font-family: Arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                margin-top: 20px;
            }
            
            td, th {
                border: 1px solid #ddd;
                text-align: center;
                padding: 8px;
            }
            
            th {
                background-color: #4CAF50;
                color: white;
            }
            
            tr:nth-child(even) {
                background-color: #f2f2f2;
            }
            
            /* CSS for the headings */
            h1 {
                font-size: 36px;
                text-align: center;
                margin-top: 50px;
            }
            
            h3 {
                font-size: 24px;
                margin-top: 30px;
            }
            
            /* CSS for the links */
            a {
                color: #008CBA;
                text-decoration: none;
            }
            
            a:hover {
                text-decoration: underline;
            }
  
        </style>
    </head>
    <body>
        <h1>Employees</h1>
        <h3><a href="index.php">Back to Home Page</a></h3>
        <h3><a href="employeesNewEntry.php">Create a New Entry</a></h3>
        <table>
            <tr>
                <th>Medicare Number</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Phone Number</th>
                <th>Address</th>
                <th>Postal Code</th>
                <th>Citizenship</th>
                <th>Email Adress</th>
                <th colspan="3">Actions</th>
            </tr>
            <?php
                 $servername = "xac353.encs.concordia.ca";
                 $username = "xac353_4";
                 $password = "COMP2023";
                 $db_name = "xac353_4";
                 // Connecting to the database
                 $conn = new mysqli($servername, $username, $password, $db_name);
     
                 //Check connection
                 if(!$conn){
                     echo "Connection Error..!!" . mysqli_connect_error();
                 }
     
                 // Write sql query for all the tables
                 $sql = "SELECT * FROM employees;";
     
                 // Make query and get results.
                 $result = mysqli_query($conn, $sql);
     
                 // Fetch the resulting rows as an array.
                 $tables = mysqli_fetch_all($result,MYSQL_ASSOC);
                 // Display list of tables
                 if (mysqli_num_rows($result) > 0) {
                     echo "<tr>";
                     foreach ($tables as $row) {
                        $key = $row['medicare_number'];
                        // echo type($row);
                        foreach($row as $col){
                            echo "<td>" . $col ."</td>";
                        }
                        // echo  "<br>" .$key . "<br>";
                        echo "<td><form action='employees.php' method='post'><input type=text value='" . $key . "' name='deleted'  hidden><input type='Submit' name='DELETE'></form>";
                        echo "</tr>";
                     }

                     if (isset($_POST['Submit'])){
                        $pkey = $_POST['deleted'];
                        $sql = "delete FROM employees where medicare_number = '$pkey';";
     
                        // Make query and get results.
                        mysqli_query($conn, $sql);
                     }
                     
                 } else {
                     echo "No tables found";
                 }
     
                 // Free Result from memory.
                 mysqli_free_result($result);
     
                 // close connection
                 mysqli_close($conn);
            ?>
        </table>
    </body>
</html>
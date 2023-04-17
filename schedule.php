<!DOCTYPE html>
<html>
    <head>
        <title>Schedule Table</title>
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
        <h1>Schedule</h1>
        <h3><a href="index.php">Back to Home Page</a></h3>
        <h3><a href="scheduleNewEntry.php">Create a New Entry</a></h3>
        <table>
            <tr>
                <th>Medicare Number</th>
                <th>Facility ID</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
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
                 $sql = "SELECT * FROM schedule;";
     
                 // Make query and get results.
                 $result = mysqli_query($conn, $sql);
     
                 // Fetch the resulting rows as an array.
                 $tables = mysqli_fetch_all($result,MYSQL_ASSOC);
                 // Display list of tables
                 if (mysqli_num_rows($result) > 0) {
                     echo "<tr>";
                     foreach ($tables as $row) {
                       
                        $medicare_number =  $row['medicare_number'];
                        $facility_id = $row['facility_id'];
                        $day = $row['day'];
                        $start_time = $row['start_time'];
                        foreach($row as $col){
                            echo "<td>" . $col ."</td>";
                        }
                        echo "<td><form action='schedule.php' method='post'><input type=text value='" . $medicare_number . "' name='medicare_number'  hidden><input type=text value='" . $facility_id . "' name='facility_id'  hidden><input type=text value='" . $day . "' name='day'  hidden><input type=text value='" . $start_time . "' name='start_time'  hidden><input type='Submit' name='Submit' value = 'DELETE'></form>";
                        echo "</tr>";
                     }
                     if (isset($_POST['Submit'])){
                        $facility_id = $_POST['facility_id'];
                        $medicare_number = $_POST['medicare_number'];
                        $day = $_POST['day'];
                        $start_time = $row['start_time'];
                        $sql = "delete FROM schedule where facility_id = '$facility_id' AND medicare_number = '$medicare_number' AND day='$day' AND start_time = '$start_time';";
                        echo "<script>alert('Value has been deleted..!!');</script>";
     
                        // Make query and get results.
                        mysqli_query($conn, $sql);
                        
                        // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                        
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

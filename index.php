

<!DOCTYPE html>
<html>
    <head>
        <title>Public Health Care System</title>
        <style>
           /* CSS Styles for the page */

/* Body */
body {
    font-family: Arial, Helvetica, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #F5F5F5;
    text-align: center;
}

/* Headings */
h1 {
    background-color: #0074D9;
    color: #FFFFFF;
    padding: 10px;
    text-align: center;
    margin: 0;
}

h2 {
    margin-top: 30px;
    text-align: center;
}

/* Tables */
.tables {
    margin: 50px auto;
    max-width: 500px;
    background-color: #FFFFFF;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

/* List of tables */
ol {
    margin: 0;
    padding: 0;
    list-style-type: none;
    font-size: 1.2em;
}

li {
    margin-bottom: 10px;
}

a {
    color: #0074D9;
    text-decoration: none;
    text-transform: uppercase;

}

a:hover {
    text-decoration: underline;
    color: red;
}

        </style>
    </head>
    <body>
        <h1>Public Health Care System</h1>
        <h2>List of Tables in the Database</h2>
        <section class="tables">
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
            $sql = "SHOW TABLES;";

            // Make query and get results.
            $result = mysqli_query($conn, $sql);

            // Fetch the resulting rows as an array.
            $tables = mysqli_fetch_all($result,MYSQL_ASSOC);
            // Display list of tables
            if (mysqli_num_rows($result) > 0) {
                echo "<ol>";
                foreach ($tables as $row) {
                    echo "<li><a href=\"" . $row['Tables_in_' . $db_name] . ".php\">" . $row['Tables_in_' . $db_name] . "</a></li>";
                }
                echo "</ol>";
            } else {
                echo "No tables found";
            }

            // Free Result from memory.
            mysqli_free_result($result);

            // close connection
            mysqli_close($conn);
        ?> 
        </section>
    </body>

</html>
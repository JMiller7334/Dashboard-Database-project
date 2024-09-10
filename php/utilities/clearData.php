<?php
    // Include the connection module to establish a database connection
    include_once 'connect.php';

    // Establish the database connection
    $connect = configConnection();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $sql = "DELETE FROM usage_data";

        $statement = mysqli_prepare($connect, $sql);
        if (mysqli_stmt_execute($statement)) {
            echo "Database: record usage deletion success";
            exit;
        } else {
            echo "Database: an error ocurred during record deletion.";
        }
        mysqli_stmt_close($statement);

         // Close the database connection
        mysqli_close($connect);
    }
?>
<?php
    include_once 'utilities/connect.php';

    $connect = configConnection();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "database: call delete function init.";
        if (isset($_POST["delId"])){
            $customerId = $_POST["delId"];

            $sql = "DELETE FROM customers WHERE id = ?";

            // Prepare the statement
            $stmt = mysqli_prepare($connect, $sql);

            if ($stmt) {
                // Bind the customer ID as a parameter
                mysqli_stmt_bind_param($stmt, "i", $customerId);

                // Execute the statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "Database: Record deleted successfully";
                    header("Location: " . $_SERVER["HTTP_REFERER"]);
                    exit;
                } else {
                    echo "Database: Error occurred while executing the statement: " . mysqli_error($connect);
                }

                // Close the statement
                mysqli_stmt_close($stmt);
            } else {
                echo "Database: Error occurred while preparing the statement";
            }
        }   
    }
?> 
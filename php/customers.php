<?php
/**Utility Customer:
 * A utility function that fires on the when the customer insert form
 * has been submitted by the user. This function makes query to the 
 * database and inserts into the database based on what the user enter.
 */

    //this is the connect module that forms the connection to the servers database.
    include_once 'utilities/connect.php';

    $connection = configConnection();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["action"]) && $_POST["action"] === "insert") {
            Insert2Database($connection);
        }
    }
    
    function Insert2Database($connect) {
        if (isset($_POST["type"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["email"])) {
            $type = $_POST["type"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $email = $_POST["email"];
    
            // Use prepared statements to prevent SQL injection.
            $stmt = $connect->prepare("INSERT INTO `customers` (`NAME`, `address`, `phone`, `email`, `customer_type`) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $name, $address, $phone, $email, $type);
    
            if ($stmt->execute()) {
                echo "database: query successful";
            } else {
                echo "database: error occurred - " . $stmt->error;
            }
    
            $stmt->close();
        } else {
            echo "database: missing parameters";
        }
    }
    
    $connection->close();
    ?>
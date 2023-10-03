<?php
/**Utility Customer:
 * A utility function that fires on the when the customer insert form
 * has been submitted by the user. This function makes query to the 
 * database and inserts into the database based on what the user enter.
 */

    //this is the connect module that forms the connection to the servers database.
    include_once 'utilities/connect.php';

    $connection = configConnection();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["submit"]) && $_POST["action"] === "insert"){
            Insert2Database($connection);
        }
    }
    function Insert2Database($connect){
        if (isset($_POST["type"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["email"])){
            $type = $_POST["type"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $email = $_POST["email"];

            //the sql query that the database and sql code will receive on the server side.
            $sql = "INSERT INTO `customers` (`name`, `address`, `phone`, `email`, `customer_type`) VALUES ('$name', '$address', '$phone', '$email', '$type')";
            $query = mysqli_query($connect, $sql);
            if($query) {
                echo "database: query successful";
                header("Location: ".$_SERVER["HTTP_REFERER"]);
                exit;
            } else {
                echo "database: error occured";
            }
        }
    }
?> 
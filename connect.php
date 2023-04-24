<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $connect = mysqli_connect("localhost", "root", "-", "dashboard_schema") or die("Connection Failed:" .mysqli_connect_error());
        if (isset($_POST["type"]) && isset($_POST["name"]) && isset($_POST["address"]) && isset($_POST["email"])){
            $type = $_POST["type"];
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $type = $_POST["type"];

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
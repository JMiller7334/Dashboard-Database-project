<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $connect = mysqli_connect("localhost", "root", "cheeseCake48#!", "dashboard_schema") or die("Connection Failed:" .mysqli_connect_error());
        if (isset($_POST["id"]) && isset($_POST["usage"]) && isset($_POST["month"])){
            $id = $_POST["id"];
            $month = $_POST["month"];
            $format_month = substr($month, 0, 3);
            $usage = $_POST["usage"];

            $sql = "INSERT INTO `usage_data` (`customerId`, `usage_month`, `customer_usage`) VALUES ('$id', '$format_month', '$usage')";
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
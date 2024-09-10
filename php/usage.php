<?php
// Include the database connection file
include_once 'utilities/connect.php';

// Create a connection
$connection = configConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["action"]) && $_POST["action"] === "insert") {
        Insert2Database($connection);
    }
}

function Insert2Database($connect) {
    if (isset($_POST["id"]) && isset($_POST["usage"]) && isset($_POST["month"])) {
        $id = $_POST["id"];
        $month = $_POST["month"];
        $format_month = substr($month, 0, 3); // Format the month
        $usage = $_POST["usage"];

        // Use prepared statements to prevent SQL injection
        $stmt = $connect->prepare("INSERT INTO `usage_data` (`customerId`, `usage_month`, `customer_usage`) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $id, $format_month, $usage);

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

// Close the connection
$connection->close();
?>

  
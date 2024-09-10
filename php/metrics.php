<?php
ob_start();
include_once 'utilities/connect.php';
$conn = configConnection();

// SQL query to retrieve all data from the usage_data table
$allQuery = "SELECT * FROM usage_data";

// Associative array to store data for each month
$monthsData = array(
    "jan" => ["usage" => 0.0, "customers" => 0],
    "feb" => ["usage" => 0.0, "customers" => 0],
    "mar" => ["usage" => 0.0, "customers" => 0],
    "apr" => ["usage" => 0.0, "customers" => 0],
    "may" => ["usage" => 0.0, "customers" => 0],
    "jun" => ["usage" => 0.0, "customers" => 0],
    "jul" => ["usage" => 0.0, "customers" => 0],
    "aug" => ["usage" => 0.0, "customers" => 0],
    "sep" => ["usage" => 0.0, "customers" => 0],
    "oct" => ["usage" => 0.0, "customers" => 0],
    "nov" => ["usage" => 0.0, "customers" => 0],
    "dec" => ["usage" => 0.0, "customers" => 0]
);

// Variables to store total values
$total_usage = 0.0;
$avg_power_usage = 0.0;
$est_profit = 0.0;
$total_customers = 0;

// Execute the SQL query to retrieve data from the usage_data table
$allResult = mysqli_query($conn, $allQuery);

if (mysqli_num_rows($allResult) > 0) {
    while ($usageRows = mysqli_fetch_assoc($allResult)) {
        $month = strtolower($usageRows["usage_month"]);

        //check array key and update the array beased on data
        if (array_key_exists($month, $monthsData)) {
            $monthsData[$month]["usage"] += $usageRows["customer_usage"];
            $monthsData[$month]["customers"] += 1;
        }
    }

    //increment data
    foreach ($monthsData as $monthData) {
        $total_usage += $monthData["usage"];
    }

    //calculate metric
    $avg_power_usage = number_format($total_usage / 12, 2);
    $est_profit = number_format($avg_power_usage * 13.31, 2);
}

// SQL query to count total customers
$sql_comm1 = "SELECT COUNT(*) AS total_customers FROM customers";
$result1 = $conn->query($sql_comm1);

if ($result1->num_rows > 0) {
    $row1 = $result1->fetch_assoc();
    $total_customers = $row1["total_customers"];
}

// Array to store customer counts for specific months
$customers_month_array = array(
    "jan" => $monthsData["jan"]["customers"],
    "feb" => $monthsData["feb"]["customers"],
    "mar" => $monthsData["mar"]["customers"],
    "apr" => $monthsData["apr"]["customers"],
    "may" => $monthsData["may"]["customers"],
    "jun" => $monthsData["jun"]["customers"],
    "jul" => $monthsData["jul"]["customers"],
    "aug" => $monthsData["aug"]["customers"],
    "sep" => $monthsData["sep"]["customers"],
    "oct" => $monthsData["oct"]["customers"],
    "nov" => $monthsData["nov"]["customers"],
    "dec" => $monthsData["dec"]["customers"]
);

// Encode the customer counts as JSON and send the response
echo json_encode($customers_month_array);

// Close the database connection
$conn->close();
?>


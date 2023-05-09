<?php
ob_start();
    // Establish connection to database

    $servername = "localhost";
    $username = "root";
    $password = "cheeseCake48#!";
    $dbname = "dashboard_schema";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $allQuery = "SELECT * FROM usage_data";
    $resultNum = 0;

    $marTotal_usage = 0.0;
    $marTotal_customers = 0;

    $aprTotal_usage = 0.0;
    $aprTotal_customers = 0;

    $mayTotal_usage = 0.0;
    $mayTotal_customers = 0;

    $junTotal_usage = 0.0;
    $junTotal_customers = 0;

    $total_usage = 0.0;

    $avg_power_usage = 0.0;
    $est_profit = 0.0;

    //Gather all data from the customer_usage table
    $allResult = mysqli_query($conn, $allQuery);
        if (mysqli_num_rows($allResult) > 0) {
            // Build the search results HTML
            while ($usageRows = mysqli_fetch_assoc($allResult)) {
                if ($usageRows["usage_month"] == "jun"){
                    $junTotal_usage += $usageRows["customer_usage"];
                    $junTotal_customers += 1;
               } 
                else if ($usageRows["usage_month"] == "may"){
                    $mayTotal_usage += $usageRows["customer_usage"];
                    $mayTotal_customers += 1;
                }
                else if ($usageRows["usage_month"] == "apr"){
                    $aprTotal_usage += $usageRows["customer_usage"];
                    $aprTotal_customers += 1;
                }
                else if ($usageRows["usage_month"] == "mar"){
                    $marTotal_usage += $usageRows["customer_usage"];
                    $marTotal_customers += 1;
                }
            }
            //calculate totals:
            $total_usage = $aprTotal_usage + $marTotal_usage + $mayTotal_usage + $junTotal_usage;
            $avg_power_usage = $total_usage/4;

            $est_profit = $avg_power_usage * 13.31; //avg cost per kWh

        }
    
    //HANDLES TOTAL CUSTOMER COUNT//
    $sql_comm1 = "SELECT COUNT(*) AS total_customers FROM customers";
    $result1 = $conn->query($sql_comm1);

    if ($result1->num_rows > 0) {
        $row1 = $result1->fetch_assoc();

        $total_customers = $row1["total_customers"];
    }

    //return the value from the server so AJAX can recieve it.
    $customers_month_array = array(
        "mar" => $marTotal_customers, 
        "apr" => $aprTotal_customers, 
        "may" => $mayTotal_customers);

    echo json_encode($customers_month_array);

    //$data2Send = implode(",", $customers_month_array);
    //echo $data2Send;


    
    // Close database connection
    $conn->close();
?>

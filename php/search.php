<?php
    // Define variables
    $searchTerm = "";
    $searchResults = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        
        $searchTerm = $_POST['search_term'];
    
        // Connect to the MySQL database
        $servername = "localhost";
        $username = "root";
        $password = "cheeseCake48#!";
        $dbname = "dashboard_schema";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Build the MySQL query
        $query = "SELECT * FROM customers WHERE name LIKE '%$searchTerm%';";
        if ($searchTerm == ""){
            $query = "SELECT * FROM customers;";
        }

        //Execute the query
        $result = mysqli_query($conn, $query);

        // Check if any results were found
        if (mysqli_num_rows($result) > 0) {
            // Build the search results HTML
            while ($row = mysqli_fetch_assoc($result)) {
                $searchResults .= "Id:" . $row['id'] . " | ".$row['name'] . "<br>";
            }
            echo $searchResults;

        } else {
            // No results found
            $searchResults .= "No matching results found.";
            echo $searchResults;
        }
        // Close the database connection
        mysqli_close($conn);
    }
?>
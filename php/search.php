<?php
    //this is the connect module that forms the connection to the servers database.
    include_once 'utilities/connect.php';

    // Define variables
    $searchTerm = "";
    $searchResults = "";

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        
        $searchTerm = $_POST['search_term'];
        $conn = configConnection();

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
                $searchResults .= "Id:" . $row['id'] . " | ".$row['NAME'] . "<br>";
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
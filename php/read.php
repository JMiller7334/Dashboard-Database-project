<?php
// Include the connection module to establish a database connection
include_once 'connect.php';

// Establish the database connection
$connection = configConnection();

$readResults = "";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["read_term"])) {
    $readTerm = $_POST['read_term'];

    // Use a prepared statement to prevent SQL injection
    $sql = "SELECT * FROM customers WHERE id = ?";
    
    // Prepare the statement
    $stmt = mysqli_prepare($connection, $sql);
    
    if ($stmt) {
        // Bind the search term as a parameter (assuming id is an integer)
        mysqli_stmt_bind_param($stmt, "i", $readTerm);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Get the result set
            $result = mysqli_stmt_get_result($stmt);

            if ($result) {
                // Fetch the user data
                $userData = mysqli_fetch_assoc($result);
                if ($userData) {
                    $readResults = "User ID: " . $userData["id"] . "<br>" .
                    "User Name: " . $userData["name"] . "<br>" .
                    "User Address: " . $userData["address"] . "<br>" .
                    "User Phone: " . $userData["phone"] . "<br>" .
                    "User Email: " . $userData["email"] . "<br>" .
                    "User Type: " . $userData["customer_type"] . "<br>";

                } else {
                    $readResults = "Database: User not found.";
                }
            } else {
                $readResults = "Database: No results found.";
            }
        } else {
            $readResults = "Database: Error occurred while executing the statement: " . mysqli_error($connection);
        }

        // Close the result set and statement
        mysqli_stmt_close($stmt);
    } else {
        $readResults = "Database: Error occurred while preparing the statement";
    }
    // Close the database connection
    mysqli_close($connection);

    // Return the HTML response
    echo $readResults;
}
?>


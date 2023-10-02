<?php
/**Connect:
 * this connects to the databse and returns the connection to the other
 * function function php files that handle database querys.
 */
function configConnection() {
    $serverName = "localhost";
    $username = "root";
    $password = "cheeseCake48#!";
    $databaseName = "dashboard_schema";

    $connection = new mysqli($serverName, $username, $password, $databaseName);
    if ($connection->connect_error){
        die("Connection failed: " . $connection->connect_error);
    }
    return $connection;
}
?>
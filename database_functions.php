<?php

function Connect()
{
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "foodorder";

    // Create Connection
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

// Function to retrieve vegetarian food items
function getVegetarianFood()
{
    $conn = Connect();

    $sql = "SELECT * FROM `food` WHERE `category` = 'Vegetarian'";
    $result = $conn->query($sql);

    $conn->close();

    return $result;
}

// Function to retrieve non-vegetarian food items
function getNonVegetarianFood()
{
    $conn = Connect();

    $sql = "SELECT * FROM `food` WHERE `category` = 'Non-Vegetarian'";
    $result = $conn->query($sql);

    $conn->close();

    return $result;
}
?>

<?php
include "database.php";

if (isset($_POST["query"]) && !empty($_POST["query"])) {
    $searchQuery = $_POST["query"];

    $sql = "SELECT * FROM teams WHERE 
            (name LIKE '%$searchQuery%' OR 
            country LIKE '%$searchQuery%' OR 
            manager LIKE '%$searchQuery%' OR 
            stadium LIKE '%$searchQuery%')";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["name"] . " - " . $row["country"] . " - " . $row["manager"] . "</li>";
        }
        echo "</ul>";
    }else {
        echo "No teams found.";
    }
    } else {
        echo "Invalid search query.";
    }

$conn->close();
?>

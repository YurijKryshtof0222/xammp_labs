<?php
include "database.php";

if (isset($_POST["query"]) && !empty($_POST["query"])) {
    $searchQuery = $_POST["query"];

    $sql = "SELECT * FROM teams WHERE 
           (name LIKE '%$searchQuery%' OR 
            city LIKE '%$searchQuery%' OR 
            manager LIKE '%$searchQuery%' OR 
            stadium LIKE '%$searchQuery%')";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Name</th><th>City</th><th>Manager</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["name"] . "</td>";
            echo "<td>" . $row["city"] . "</td>";
            echo "<td>" . $row["manager"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "Команд не знайдено.";
    }
} else {
    echo "Invalid search query.";
}

$conn->close();
?>

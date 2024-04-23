<?php

function connect_to_db() {
    $con = mysqli_connect("localhost", "root", "", "laba8");

    if (!$con) {
        exit("Помилка з'єднання: ("
        .mysqli_connect_errno()
        .")"
        .mysqli_connect_error());
    }

    return $con;
}

// mysqli_select_db($con, "laba8")

?>
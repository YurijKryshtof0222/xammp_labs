<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Обробка форми PHP</title>
</head>
<body>
    <?php
    include "db.php";

    function my_func($x, $y, $z, $variant) {
        $result = cos(pow($x + pow(sin(pow(abs($y),0.3)), 2), 2));
        $result /= pow(abs($x), 0.1) / $z - pi() / 6;
        $result += pow(log(pow(abs($z / $x), 0.3)) ,2);

        return $result;
    }

    function write_to_db_18($variant) {
        $X1 = 1.23 * $variant;
        $Y1 = 4.6 * $variant ;
        $Z1 = 36.6 / $variant;

        $con = connect_to_db();

        $result = my_func($X1, $Y1, $Z1, $variant);
        
        $delete_query = "DELETE FROM tabulation";
        mysqli_query($con , $delete_query) or die(mysqli_error($con));
        $insert_query = "INSERT INTO tabulation (x, y, z, func_result) 
            values ($X1, $Y1, $Z1, $result)";
        
        mysqli_query($con , $insert_query) or die(mysqli_error($con));
        
        echo '<h1>Результат обробки форми для лабораторної роботи №8</h1>';
        echo "<p>Дані збережені у Базу даних.</p>";
    }

    function write_to_db_19($variant) {
        
        $x_begin = 1.23 * $variant;
        $Y1 = 4.6 * $variant ;
        $Z1 = 36.6 / $variant;

        $con = connect_to_db();
        
        $delete_query = "DELETE FROM tabulation";
        mysqli_query($con , $delete_query) or die(mysqli_error($con));

        for ($x_step = $x_begin; $x_step <= $x_begin + 10; $x_step++) {
            $result = my_func($x_step, $Y1, $Z1, $variant);
            
            $insert_query = "INSERT INTO tabulation (x, y, z, func_result) 
                values ($x_step, $Y1, $Z1, $result)";

            mysqli_query($con , $insert_query) or die(mysqli_error($con));
        }
        echo '<h1>Результат обробки форми для лабораторної роботи №8</h1>';
        echo "<p>Дані збережені у Базу даних.</p>";
    }

    function read_from_db() {
        $con = connect_to_db();
    
        $select_query = "SELECT * FROM tabulation";
        $result = mysqli_query($con, $select_query) or die(mysqli_error($con));
    
        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Записи у таблиці tabulation:</h2>";
            echo "<table border='1'>
            <tr>
            <th>X</th>
            <th>Y</th>
            <th>Z</th>
            <th>Результат функції</th>
            </tr>";
    
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['x'] . "</td>";
                echo "<td>" . $row['y'] . "</td>";
                echo "<td>" . $row['z'] . "</td>";
                echo "<td>" . $row['func_result'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Немає записів у базі даних.</p>";
        }
    
        mysqli_close($con);
    }
    
    
    if (isset($_POST['submit'])) {
        $surname = $_POST['surname'];
        $name = $_POST['name'];
        $group = $_POST['group'];
        $variant = $_POST['variant'];
        
        write_to_db_19($variant);

        read_from_db();

    } else {
        echo "<p>Форма не була відправлена.</p>";
    }

    ?>
</body>
</html>
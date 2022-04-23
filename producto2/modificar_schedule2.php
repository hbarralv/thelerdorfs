<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'producto 2');


try {
    $bbdd = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

?>


<html>

<body>
    <?php require 'header.php' ?>

    <?php
    $id_schedule = $_POST['id_schedule'];
    $id_class = $_POST['id_class'];
    $time_start = $_POST['time_start'];
    $time_end = $_POST['time_end'];
    $day = $_POST['day'];

    $sql = "UPDATE schedule SET id_class = :id_class, time_start = :time_start, time_end = :time_end, day = :day WHERE schedule.id_schedule = :id_schedule";

    $query = $bbdd->prepare($sql);

    $query->bindParam(':id_schedule', $id_schedule, PDO::PARAM_INT);
    $query->bindParam(':id_class', $id_class, PDO::PARAM_INT);
    $query->bindParam(':time_start', $time_start, PDO::PARAM_STR, 100);
    $query->bindParam(':time_end', $time_end, PDO::PARAM_STR, 100);
    $query->bindParam(':day', $day, PDO::PARAM_STR, 100);

    $query->execute();

    $lastInsertId = $bbdd->lastInsertId();

    if ($query->rowCount() > 0) {
        $count = $query->rowCount();
        require 'successUpdate.php';
    } else {
        require 'errorUpdate.php';
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_schedule.php"> Volver </a></button>
    </div>
</body>

</html>
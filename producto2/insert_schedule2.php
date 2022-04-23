<?php
$bbdd = new PDO('mysql:host=localhost;dbname=producto 2', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
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
    $id_schedule = $id_schedule++;

    $sql = "insert into schedule(Id_Schedule,Id_Class,Time_Start,Time_End,Day)
            values(:id_schedule,:id_class,:time_start,:time_end,:day)";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id_schedule', $id_schedule, PDO::PARAM_INT);
    $sql->bindParam(':id_class', $id_class, PDO::PARAM_INT);
    $sql->bindParam(':time_start', $time_start, PDO::PARAM_STR, 100);
    $sql->bindParam(':time_end', $time_end, PDO::PARAM_STR, 100);
    $sql->bindParam(':day', $day, PDO::PARAM_STR, 100);

    $sql->execute();

    $lastInsertId = $bbdd->lastInsertId();
    if ($lastInsertId > 0) {
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>Horario añadido correctamente.</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> ERROR: no ha sido posible agregar el nuevo horario.</h4></div></div>";
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_schedule.php"> Volver </a></button>
    </div>
</body>


</html>
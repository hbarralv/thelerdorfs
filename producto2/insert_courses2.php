<?php
$bbdd = new PDO('mysql:host=localhost;dbname=producto 2', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
?>

<html>

<body>
    <?php require 'header.php' ?>
    <?php

    $id_course = $_POST['id_course'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $date_start = $_POST['date_start'];
    $date_end = $_POST['date_end'];
    $active = $_POST['active'];
    $id_course = $id_course++;

    $sql = "insert into courses(Id_Course,Name,Description,Date_Start,Date_End,Active)
            values(:id_course,:name,:description,:date_start,:date_end,:active)";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id_course', $id_course, PDO::PARAM_INT);
    $sql->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $sql->bindParam(':description', $description, PDO::PARAM_STR, 100);
    $sql->bindParam(':date_start', $date_start, PDO::PARAM_STR, 100);
    $sql->bindParam(':date_end', $date_end, PDO::PARAM_STR, 100);
    $sql->bindParam(':active', $active, PDO::PARAM_INT);

    $sql->execute();

    $lastInsertId = $bbdd->lastInsertId();
    if ($lastInsertId > 0) {
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>El curso $name se ha guardado correctamente</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> ERROR: no sido posible agregar el nuevo curso. </h4></div></div>";
    }

    ?>

    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_courses.php"> Volver </a></button>
    </div>

</body>


</html>
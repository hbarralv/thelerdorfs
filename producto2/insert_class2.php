<?php
$bbdd = new PDO('mysql:host=localhost:3306;dbname=wordpress20', 'wordpress20', 'v2agwoku4Q54ij3M', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
?>

<html>

<body>
    <?php require 'header.php' ?>
    <?php

    $id_class = $_POST['id_class'];
    $id_teacher = $_POST['id_teacher'];
    $id_course = $_POST['id_course'];
    $id_schedule = $_POST['id_schedule'];
    $name = $_POST['name'];
    $color = $_POST['color'];
    $id_class = $id_class++;

    $sql = "insert into class(Id_Class,Id_Teacher,Id_Course,Id_Schedule,Name,Color)
            values(:id_class,:id_teacher,:id_course,:id_schedule,:name,:color)";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id_class', $id_class, PDO::PARAM_INT);
    $sql->bindParam(':id_teacher', $id_teacher, PDO::PARAM_INT);
    $sql->bindParam(':id_course', $id_course, PDO::PARAM_INT);
    $sql->bindParam(':id_schedule', $id_schedule, PDO::PARAM_INT);
    $sql->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $sql->bindParam(':color', $color, PDO::PARAM_STR, 100);

    $sql->execute();

    $lastInsertId = $bbdd->lastInsertId();

    if ($lastInsertId > 0) {
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>La clase $name se ha guardado correctamente.</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> ERROR: ha ocurrido un error inesperado. </h4></div></div>";
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_class.php"> Volver </a></button>
    </div>
</body>


</html>
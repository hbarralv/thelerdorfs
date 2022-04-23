<?php
$bbdd = new PDO('mysql:host=localhost;dbname=producto 2', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
?>

<html>

<body>
    <?php require 'header.php' ?>

    <?php

    $id_teacher = $_POST['id_teacher'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $telephone = $_POST['telephone'];
    $nif = $_POST['nif'];
    $email = $_POST['email'];
    $id_teacher = $id_teacher++;

    $sql = "insert into teachers(Id_Teacher,Name,Surname,Telephone,Nif,Email)
            values(:id_teacher,:name,:surname,:telephone,:nif,:email)";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id_teacher', $id_teacher, PDO::PARAM_INT);
    $sql->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $sql->bindParam(':surname', $surname, PDO::PARAM_STR, 100);
    $sql->bindParam(':telephone', $telephone, PDO::PARAM_INT);
    $sql->bindParam(':nif', $nif, PDO::PARAM_STR, 100);
    $sql->bindParam(':email', $nif, PDO::PARAM_STR, 100);

    $sql->execute();

    $lastInsertId = $bbdd->lastInsertId();
    if ($lastInsertId > 0) {
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>Se ha agreado al profesor $name $surname correctamente.</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> ERROR: no ha sido posible agregar al nuevo profesor.</h4></div></div>";
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_teachers.php"> Volver </a></button>
    </div>

</body>


</html>
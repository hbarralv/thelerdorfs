<?php
$bbdd = new PDO('mysql:host=localhost:3306;dbname=wordpress20', 'wordpress20', 'v2agwoku4Q54ij3M', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
?>

<html>

<body>
    <?php require 'header.php' ?>

    <?php

    $id = $_POST['id'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $telephone = $_POST['telephone'];
    $nif = $_POST['nif'];
    $date_registered = $_POST['date_registered'];
    $id = $id++;

    $sql = "insert into students(Id,Username,Pass,Email,Name,Surname,Telephone,Nif,Date_Registered)
            values(:id,:username,:pass,:email,:name,:surname,:telephone,:nif,:date_registered)";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id', $id, PDO::PARAM_INT);
    $sql->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $sql->bindParam(':pass', $pass, PDO::PARAM_STR, 100);
    $sql->bindParam(':email', $email, PDO::PARAM_STR, 100);
    $sql->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $sql->bindParam(':surname', $surname, PDO::PARAM_STR, 100);
    $sql->bindParam(':telephone', $telephone, PDO::PARAM_INT);
    $sql->bindParam(':nif', $nif, PDO::PARAM_STR, 100);
    $sql->bindParam(':date_registered', $date_registered, PDO::PARAM_STR, 100);

    $sql->execute();

    $lastInsertId = $bbdd->lastInsertId();
    if ($lastInsertId > 0) {
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>El estudiante $name $surname ha sido agregado correctamente.</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> ERROR: no ha sido posible agregar al nuevo estudiante.</h4></div></div>";
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_students.php"> Volver </a></button>
    </div>

</body>


</html>
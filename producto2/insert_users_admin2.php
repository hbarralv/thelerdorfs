<?php
$bbdd = new PDO('mysql:host=localhost;dbname=producto 2', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
?>

<html>

<body>
    <?php require 'header.php' ?>
    <?php

    $id_user_admin = $_POST['id_user_admin'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $id_user_admin = $id_user_admin++;

    $sql = "insert into users_admin(Id_User_Admin,Username,Name,Email,Password)
            values(:id_user_admin,:username,:name,:email,:password)";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id_user_admin', $id_user_admin, PDO::PARAM_INT);
    $sql->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $sql->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $sql->bindParam(':email', $email, PDO::PARAM_STR, 100);
    $sql->bindParam(':password', $password, PDO::PARAM_STR, 100);

    $sql->execute();

    $lastInsertId = $bbdd->lastInsertId();
    if ($lastInsertId > 0) {
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>$username ha sido agregado como nuevo administrador.</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> ERROR: no ha sido posible agregar al nuevo administrador.</h4></div></div>";
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_users_admin.php"> Volver </a></button>
    </div>
</body>

</html>
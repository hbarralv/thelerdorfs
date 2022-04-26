<?php

define('DB_HOST', 'localhost:3306');
define('DB_USER', 'wordpress20');
define('DB_PASS', 'v2agwoku4Q54ij3M');
define('DB_NAME', 'wordpress20');

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
    $id_user_admin = $_POST['id_user_admin'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "UPDATE users_admin SET username = :username, name = :name, email = :email, password = :password WHERE users_admin.id_user_admin = :id_user_admin";

    $query = $bbdd->prepare($sql);

    $query->bindParam(':id_user_admin', $id_user_admin, PDO::PARAM_INT);
    $query->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $query->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $query->bindParam(':email', $email, PDO::PARAM_STR, 100);
    $query->bindParam(':password', $password, PDO::PARAM_STR, 100);

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
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_users_admin.php"> Volver </a></button>
    </div>
</body>

</html>
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
    $id_teacher = $_POST['id_teacher'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $telephone = $_POST['telephone'];
    $nif = $_POST['nif'];
    $email = $_POST['email'];

    $sql = "UPDATE teachers SET name = :name, surname = :surname, telephone = :telephone, nif = :nif, email = :email WHERE teachers.id_teacher = :id_teacher";

    $query = $bbdd->prepare($sql);

    $query->bindParam(':id_teacher', $id_teacher, PDO::PARAM_INT);
    $query->bindParam(':name', $name, PDO::PARAM_INT);
    $query->bindParam(':surname', $surname, PDO::PARAM_STR, 100);
    $query->bindParam(':telephone', $telephone, PDO::PARAM_STR, 100);
    $query->bindParam(':nif', $nif, PDO::PARAM_STR, 100);
    $query->bindParam(':email', $nif, PDO::PARAM_STR, 100);

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
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_teachers.php"> Volver </a></button>
    </div>
</body>

</html>
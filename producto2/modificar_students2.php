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
    $id = $_POST['id'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $telephone = $_POST['telephone'];
    $nif = $_POST['nif'];
    $date_registered = $_POST['date_registered'];

    $sql = "UPDATE students SET username = :username, pass = :pass, email = :email, name = :name, surname = :surname,
    telephone = :telephone, nif = :nif, date_registered = :date_registered WHERE students.id = :id";

    $query = $bbdd->prepare($sql);

    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->bindParam(':username', $username, PDO::PARAM_STR, 100);
    $query->bindParam(':pass', $pass, PDO::PARAM_STR, 100);
    $query->bindParam(':email', $email, PDO::PARAM_STR, 100);
    $query->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $query->bindParam(':surname', $surname, PDO::PARAM_STR, 100);
    $query->bindParam(':telephone', $telephone, PDO::PARAM_STR, 100);
    $query->bindParam(':nif', $nif, PDO::PARAM_STR, 100);
    $query->bindParam(':date_registered', $date_registered, PDO::PARAM_STR, 100);

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
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_students.php"> Volver </a></button>
    </div>
</body>

</html>
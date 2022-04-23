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
    $id_enrollment = $_POST['id_enrollment'];
    $id_student = $_POST['id_student'];
    $id_course = $_POST['id_course'];
    $status = $_POST['status'];

    $sql = "UPDATE enrollment SET id_student = :id_student, id_course = :id_course, status = :status WHERE enrollment.id_enrollment = :id_enrollment";

    $query = $bbdd->prepare($sql);

    $query->bindParam(':id_enrollment', $id_enrollment, PDO::PARAM_INT);
    $query->bindParam(':id_student', $id_student, PDO::PARAM_INT);
    $query->bindParam(':id_course', $id_course, PDO::PARAM_INT);
    $query->bindParam(':status', $status, PDO::PARAM_INT);

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
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_enrollment.php"> Volver </a></button>
    </div>
</body>

</html>
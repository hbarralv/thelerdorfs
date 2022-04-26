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

    $sql = "UPDATE class SET name = :name, id_teacher = :id_teacher, id_course = :id_course, id_schedule = :id_schedule, color = :color WHERE id_class = :id_class";

    $query = $bbdd->prepare($sql);

    $query->bindParam(':id_class', $id_class, PDO::PARAM_INT);
    $query->bindParam(':id_teacher', $id_teacher, PDO::PARAM_INT);
    $query->bindParam(':id_course', $id_course, PDO::PARAM_INT);
    $query->bindParam(':id_schedule', $id_schedule, PDO::PARAM_INT);
    $query->bindParam(':name', $name, PDO::PARAM_STR, 100);
    $query->bindParam(':color', $color, PDO::PARAM_STR, 100);

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
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_class.php"> Volver </a></button>
    </div>
</body>

</html>
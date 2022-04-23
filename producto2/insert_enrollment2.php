<?php
$bbdd = new PDO('mysql:host=localhost;dbname=producto 2', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
?>


<html>

<body>
    <?php require 'header.php' ?>

    <?php

    $id_enrollment = $_POST['id_enrollment'];
    $id_student = $_POST['id_student'];
    $id_course = $_POST['id_course'];
    $status = $_POST['status'];
    $id_enrollment = $id_enrollment++;

    $sql = "insert into enrollment(Id_Enrollment,Id_Student,Id_Course,Status)
            values(:id_enrollment,:id_student,:id_course,:status)";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id_enrollment', $id_enrollment, PDO::PARAM_INT);
    $sql->bindParam(':id_student', $id_student, PDO::PARAM_INT);
    $sql->bindParam(':id_course', $id_course, PDO::PARAM_INT);
    $sql->bindParam(':status', $status, PDO::PARAM_INT);

    $sql->execute();

    $lastInsertId = $bbdd->lastInsertId();
    if ($lastInsertId > 0) {
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>Matrícula agregada correctamente, el estado es $status</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> ERROR: no ha sido posible agregar la nueva matricula. </h4></div></div>";
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_enrollment.php"> VOLVER </a></button>
    </div>

</body>


</html>
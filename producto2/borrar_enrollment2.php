<html>

<body>
    <?php require 'header.php' ?>
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

    $id_enrollment = $_POST['id_enrollment'];

    $sql = "DELETE FROM enrollment WHERE id_enrollment = :id_enrollment";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id_enrollment', $id_enrollment, PDO::PARAM_INT);

    $sql->execute();

    if ($sql->rowCount() > 0) {
        $count = $sql->rowCount();
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>Matrícula eliminada correctamente</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> Error al intentar eliminar la matícula </h4></div></div>";
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_enrollment.php"> VOLVER </a></button>
    </div>

</body>


</html>
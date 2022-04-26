<html>

<body>
    <?php require 'header.php' ?>
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

    $id_class = $_POST['id_class'];

    $sql = "DELETE FROM class WHERE id_class = :id_class";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id_class', $id_class, PDO::PARAM_INT);

    $sql->execute();

    if ($sql->rowCount() > 0) {
        $count = $sql->rowCount();
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>Clase eliminada correctamente</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> Error al intentar eliminar la clase </h4></div></div>";
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_class.php"> VOLVER </a></button>
    </div>
</body>


</html>
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

    $id_user_admin = $_POST['id_user_admin'];

    $sql = "DELETE FROM users_admin WHERE id_user_admin = :id_user_admin";

    $sql = $bbdd->prepare($sql);

    $sql->bindParam(':id_user_admin', $id_user_admin, PDO::PARAM_INT);

    $sql->execute();

    if ($sql->rowCount() > 0) {
        $count = $sql->rowCount();
        echo " <div class='main-container'><div class='content alert alert-primary' > <h4>Administrador eliminado correctamente</h4></div></div>";
    } else {
        echo "<div class='main-container'><div class= 'content alert alert-primary' ><h4> Error al intentar eliminar al administrador </h4></div></div>";
    }

    ?>
    <div class='main-container'>
        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_users_admin.php"> VOLVER </a></button>
    </div>
</body>


</html>
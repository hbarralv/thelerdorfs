<?php
$conexion = mysqli_connect('localhost:3306', 'wordpress20', 'v2agwoku4Q54ij3M', 'wordpress20');
?>
<!DOCTYPE html>
<html>

<body>
    <?php require 'header.php' ?>

    <div class="main-container">
        <h2>Administradores</h2>
        <table border="1" class="table">
            <tr>
                <th>Administrador</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>e-mail</th>
            </tr>
            <?php
            $sql = "SELECT * from users_admin";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['id_user_admin'] ?></td>
                    <td><?php echo $mostrar['username'] ?></td>
                    <td><?php echo $mostrar['name'] ?></td>
                    <td><?php echo $mostrar['email'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="buttons">
            <br><button class="class-button"><a style="text-decoration:none" href="insert_users_admin1.php">Añadir</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="modificar_users_admin1.php">Modificar</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="borrar_users_admin1.php">Eliminar</a></button><br>
        </div>

        <br><button class="back-button class-button"><a style="text-decoration:none" href="/producto2/indexAdmin.php"> Volver </a></button><br>
    </div>

</body>

</html>
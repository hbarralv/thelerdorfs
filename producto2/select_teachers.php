<?php
$conexion = mysqli_connect('localhost', 'root', '', 'producto 2');
?>
<!DOCTYPE html>
<html>

<body>
    <?php require 'header.php' ?>

    <div class="main-container">
        <h2>Profesores</h2>
        <table border="1" class="table">
            <tr>
                <th>Profesor</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>DNI</th>
                <th>e-mail</th>
            </tr>
            <?php
            $sql = "SELECT * from teachers";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['id_teacher'] ?></td>
                    <td><?php echo $mostrar['name'] ?></td>
                    <td><?php echo $mostrar['surname'] ?></td>
                    <td><?php echo $mostrar['telephone'] ?></td>
                    <td><?php echo $mostrar['nif'] ?></td>
                    <td><?php echo $mostrar['email'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="buttons">
            <button class="class-button"><a style="text-decoration:none" href="insert_teachers1.php">Añadir</a></button>
            <button class="class-button"><a style="text-decoration:none" href="modificar_teachers1.php">Modificar</a></button>
            <button class="class-button"><a style="text-decoration:none" href="borrar_teachers1.php">Eliminar</a></button>
        </div>

        <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/indexAdmin.php"> Volver </a></button>
    </div>

</body>

</html>
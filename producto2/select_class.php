<?php
$conexion = mysqli_connect('localhost', 'root', '', 'producto 2');
?>
<!DOCTYPE html>
<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <h2>Mis clases</h2>

        <table border="1" class="table">
            <tr>
                <th>Código</th>
                <th>Profesor</th>
                <th>Curso</th>
                <th>Horario</th>
                <th>Nombre</th>
                <th>Color</th>
            </tr>
            <?php
            $sql = "SELECT * from class";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['id_class'] ?></td>
                    <td><?php echo $mostrar['id_teacher'] ?></td>
                    <td><?php echo $mostrar['id_course'] ?></td>
                    <td><?php echo $mostrar['id_schedule'] ?></td>
                    <td><?php echo $mostrar['name'] ?></td>
                    <td><?php echo $mostrar['color'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="buttons">
            <br><button class="class-button"><a style="text-decoration:none" href="insert_class1.php">Añadir</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="modificar_class1.php">Modificar</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="borrar_class1.php">Eliminar</a></button><br>
        </div>
        <br><button class="back-button class-button"><a style="text-decoration:none" href="/producto2"> Volver </a></button><br>

    </div>
</body>

</html>
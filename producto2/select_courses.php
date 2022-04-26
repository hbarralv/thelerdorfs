<?php
$conexion = mysqli_connect('localhost:3306', 'wordpress20', 'v2agwoku4Q54ij3M', 'wordpress20');
?>
<!DOCTYPE html>
<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <h2>Mis cursos</h2>

        <table border="1" class="table">
            <tr>
                <th>Código</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha de inicio</th>
                <th>Fecha de finalización</th>
                <th>¿Activo?</th>
            </tr>
            <?php
            $sql = "SELECT * from courses";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['id_course'] ?></td>
                    <td><?php echo $mostrar['name'] ?></td>
                    <td><?php echo $mostrar['description'] ?></td>
                    <td><?php echo $mostrar['date_start'] ?></td>
                    <td><?php echo $mostrar['date_end'] ?></td>
                    <td><?php echo $mostrar['active'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="buttons">
            <br><button class="class-button"><a style="text-decoration:none" href="insert_courses1.php">Añadir</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="modificar_courses1.php">Modificar</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="borrar_courses1.php">Eliminar</a></button><br>
        </div>

        <br><button class="back-button class-button"><a style="text-decoration:none" href="/producto2"> Volver </a></button><br>
</body>

</html>
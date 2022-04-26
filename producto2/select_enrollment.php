<?php
$conexion = mysqli_connect('localhost:3306', 'wordpress20', 'v2agwoku4Q54ij3M', 'wordpress20');
?>
<!DOCTYPE html>
<html>

<body>
    <?php require 'header.php' ?>

    <div class="main-container">
        <h2>Mis matrículas</h2>

        <table border="1" class="table">
            <tr>
                <th>Código</th>
                <th>Alumno</th>
                <th>Curso</th>
                <th>Estado</th>
            </tr>
            <?php
            $sql = "SELECT * from enrollment";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['id_enrollment'] ?></td>
                    <td><?php echo $mostrar['id_student'] ?></td>
                    <td><?php echo $mostrar['id_course'] ?></td>
                    <td><?php echo $mostrar['status'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>

        <div class="buttons">
            <br><button class="class-button"><a style="text-decoration:none" href="insert_enrollment1.php">Añadir</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="modificar_enrollment1.php">Modificar</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="borrar_enrollment1.php">Eliminar</a></button><br>
        </div>

        <br><button class="back-button class-button"><a style="text-decoration:none" href="/producto2/indexAdmin.php"> Volver </a></button><br>
    </div>
</body>

</html>
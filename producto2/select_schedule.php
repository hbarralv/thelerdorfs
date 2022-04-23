<?php
$conexion = mysqli_connect('localhost', 'root', '', 'producto 2');
?>
<!DOCTYPE html>
<html>

<body>
    <?php require 'header.php' ?>

    <div class="main-container">
        <h2>Mis horarios</h2>
        <table border="1" class="table">
            <tr>
                <th>Código</th>
                <th>Clase</th>
                <th>Fecha de inicio</th>
                <th>Fecha de finalización</th>
                <th>Día</th>
            </tr>
            <?php
            $sql = "SELECT * from schedule";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['id_schedule'] ?></td>
                    <td><?php echo $mostrar['id_class'] ?></td>
                    <td><?php echo $mostrar['time_start'] ?></td>
                    <td><?php echo $mostrar['time_end'] ?></td>
                    <td><?php echo $mostrar['day'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="buttons">
            <br><button class="class-button"><a style="text-decoration:none" href="insert_schedule1.php">Añadir</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="modificar_schedule1.php">Modificar</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="borrar_schedule1.php">Eliminar</a></button><br>
        </div>

        <br><button class="back-button class-button"><a style="text-decoration:none" href="/producto2/indexAdmin.php"> Volver </a></button><br>
    </div>
</body>

</html>
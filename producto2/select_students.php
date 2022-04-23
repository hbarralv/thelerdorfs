<?php
$conexion = mysqli_connect('localhost', 'root', '', 'producto 2');
?>


<!DOCTYPE html>
<html>

<body>

    <?php require 'header.php' ?>

    <div class="main-container">
        <h2>Estudiantes</h2>
        <table border="1" class="table">
            <tr>
                <th>Usuario</th>
                <th>email</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>DNI</th>
                <th>Fecha de registro</th>
            </tr>
            <?php
            $sql = "SELECT * from students";
            $result = mysqli_query($conexion, $sql);
            while ($mostrar = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo $mostrar['username'] ?></td>
                    <td><?php echo $mostrar['email'] ?></td>
                    <td><?php echo $mostrar['name'] ?></td>
                    <td><?php echo $mostrar['surname'] ?></td>
                    <td><?php echo $mostrar['telephone'] ?></td>
                    <td><?php echo $mostrar['nif'] ?></td>
                    <td><?php echo $mostrar['date_registered'] ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
        <div class="buttons">
            <br><button class="class-button"><a style="text-decoration:none" href="insert_students1.php">Añadir</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="modificar_students1.php">Modificar</a></button><br>
            <br><button class="class-button"><a style="text-decoration:none" href="borrar_students1.php">Eliminar</a></button><br>
        </div>

        <br><button class="back-button class-button"><a style="text-decoration:none" href="/producto2/indexAdmin.php"> Volver </a></button><br>
    </div>

</body>

</html>
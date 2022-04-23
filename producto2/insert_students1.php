</html>
<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <h1>Añadir estudiante</h1>
        <br>
        <form action="insert_students2.php" method="post">
            <td><input type="hidden" name="id">
                <table border="1" class="table">
                    <tr>
                        <th>Usuario</th>
                        <td><input type="text" name="username"></td>
                    </tr>
                    <tr>
                        <th>Contraseña</th>
                        <td><input type="text" name="pass"></td>
                    </tr>
                    <tr>
                        <th>e-mail</th>
                        <td><input type="text" name="email"></td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td><input type="text" name="name"></td>
                    </tr>
                    <tr>
                        <th>Apellidos</th>
                        <td><input type="text" name="surname"></td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td><input type="text" name="telephone"></td>
                    </tr>
                    <tr>
                        <th>DNI</th>
                        <td><input type="text" name="nif"></td>
                    </tr>
                    <tr>
                        <th>Fecha de registro</th>
                        <td><input type="date" name="date_registered" value="2022-01-01" min="2022-01-01" max="2023-12-31"></td>
                    </tr>
                </table>

                <button class="shared-button" type="submit">Añadir Horario</button>
        </form>
        <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_students.php"> Volver </a></button>
</body>

</html>
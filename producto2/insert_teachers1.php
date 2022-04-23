<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <h1>Añadir profesor</h1>
        <br>
        <form action="insert_teachers2.php" method="post">
            <td><input type="hidden" name="id_teacher">
                <table border="1">
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
                        <th>e-mail</th>
                        <td><input type="text" name="email"></td>
                    </tr>
                </table>
                <br>
                <button class="shared-button" type="submit">Añadir profesor</button>

        </form>

        <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_teachers.php"> Volver </a></button>
    </div>
</body>

</html>
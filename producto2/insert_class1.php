<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <h2>Añadir clase</h2>
        <br>
        <form action="insert_class2.php" method="post">
            <input type="hidden" name="id_class">
            <table border="1" class="table">
                <tr>
                    <th>ID Profesor</th>
                    <td><input type="text" name="id_teacher"></td>
                </tr>
                <tr>
                    <th>ID Curso</th>
                    <td><input type="text" name="id_course"></td>
                </tr>
                <tr>
                    <th>ID Horario</th>
                    <td><input type="text" name="id_schedule"></td>
                </tr>
                <tr>
                    <th>Nombre</th>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <th>Color</th>
                    <td><input type="text" name="color"></td>
                </tr>
            </table>
            <br>
            <button class="shared-button" type="submit">Insertar clase</button>
        </form>

        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_class.php"> VOLVER </a></button>
    </div>
</body>

</html>
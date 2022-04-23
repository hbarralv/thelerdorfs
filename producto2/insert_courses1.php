<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <h2>Añadir curso</h2>
        <br>
        <form action="insert_courses2.php" method="post">
            <input type="hidden" name="id_course"></td>
            <table border="1" class="table">
                <tr>
                    <th>Nombre</th>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td><input type="text" name="description"></td>
                </tr>
                <tr>
                    <th>Fecha de inicio</th>
                    <td><input type="date" name="date_start" value="2022-01-01" min="2021-01-01" max="2023-12-31">></td>
                </tr>
                <tr>
                    <th>Fecha de finalización</th>
                    <td><input type="date" name="date_end" value="2022-01-01" min="2021-01-01" max="2023-12-31">></td>
                </tr>
                <tr>
                    <th>¿Activo?</th>
                    <td><select name="active">
                            <option value=0>No</option>
                            <option value=1>Sí</option>
                    </td>
                </tr>
            </table>
            <br>
            <button class="shared-button" type="submit">Agregar curso</button>
        </form>

        <button class="back-button class-button"><a class="white-link" style="text-decoration:none" href="/producto2/select_courses.php"> Volver </a></button>
</body>

</html>
<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <h1>Añadir matrícula</h1>
        <br>
        <form action="insert_enrollment2.php" method="post">
            <input type="hidden" name="id_enrollment"></td>
            <table border="1" class="table">
                <tr>
                    <th>Alumno</th>
                    <td><input type="text" name="id_student"></td>
                </tr>
                <tr>
                    <th>Curso</th>
                    <td><input type="text" name="id_course"></td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td><select name="status">
                            <option value=0>Inactiva</option>
                            <option value=1>Activa</option>
                    </td>
                </tr>
            </table>
            <br>
            <button class="shared-button" type="submit">Agregar matricula</button>
        </form>

        <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_enrollment.php"> Volver </a></button>
    </div>
</body>

</html>
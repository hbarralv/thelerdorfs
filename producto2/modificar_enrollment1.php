<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <div class="container">

            <section class="card">
                <h3>Modificar matrícula</h3>

                <form action="modificar_enrollment2.php" method="post">
                    <label>Matrícula</label><input type="text" name="id_enrollment">
                    <label>Estudiante</label><input type="text" name="id_student">
                    <label>Curso:</label><input type="text" name="id_course">
                    <label>Estado</label><select name="status">
                        <option value=0>Inactivo</option>
                        <option value=1>Activo</option>
                        <input type="submit" value="Actualizar matrícula">

                </form>
                <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_enrollment.php"> Volver </a></button>
            </section>
        </div>
    </div>
</body>

</html>
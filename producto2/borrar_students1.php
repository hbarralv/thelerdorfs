<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">

        <section class="login-container">
            <h1>Eliminar estudiante: </h1>
            <form action="borrar_students2.php" method="post">

                <label>ID Alumno: </label><input type="text" name="id">

                <input type="submit" value="Eliminar alumno">

            </form>
            <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_students.php"> Volver </a></button>
        </section>

    </div>
</body>

</html>
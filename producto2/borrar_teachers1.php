<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">

        <section class="login-container">
            <h1>Eliminar profesor: </h1>

            <form action="borrar_teachers2.php" method="post">

                <label>ID Profesor</label><input type="text" name="id_teacher">

                <input type="submit" value="Eliminar profesor">

            </form>
            <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_teachers.php"> Volver </a></button>
        </section>

    </div>
</body>

</html>
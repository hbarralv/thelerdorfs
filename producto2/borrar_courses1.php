<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">

        <section class="login-container">
            <h1>Eliminar curso</h1>
            <form action="borrar_courses2.php" method="post">
                <label>ID Curso: </label><input type="text" name="id_course">

                <input type="submit" value="Eliminar curso">
            </form>
            <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_courses.php"> Volver </a></button>
        </section>

    </div>
</body>

</html>
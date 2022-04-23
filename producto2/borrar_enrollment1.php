<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">

        <section class="login-container">
            <h1>Eliminar matrícula</h1>
            <form action="borrar_enrollment2.php" method="post">
                <label>ID Matrícula: </label><input type="text" name="id_enrollment">
                <input type="submit" value="Eliminar matrícula">
            </form>
            <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_enrollment.php"> Volver </a></button>
        </section>

    </div>
</body>

</html>
<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <section class="login-container">
            <h1>Eliminar clase</h1>
            <form action="borrar_class2.php" method="post">
                <label>ID Clase:</label><input type="text" name="id_class">
                <input type="submit" value="Eliminar clase">
            </form>
            <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_class.php"> Volver </a></button>
        </section>
    </div>
</body>

</html>
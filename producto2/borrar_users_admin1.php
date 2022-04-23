<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">

        <section class="login-container">
            <h1>Eliminar administrador: </h1>
            <form action="borrar_users_admin2.php" method="post">

                <label>ID Administrador</label><input type="text" name="id_user_admin">

                <input type="submit" value="Eliminar administrador">

            </form>
            <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_users_admin.php"> Volver </a></button>
        </section>

    </div>
</body>

</html>
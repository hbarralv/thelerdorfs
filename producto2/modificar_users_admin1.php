<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <div class="container">

            <section class="card">
                <h3>Modificar administrador</h3>

                <form action="modificar_users_admin2.php" method="post">

                    <label>ID</label><input type="text" name="id_user_admin">
                    <label>Usuario</label><input type="text" name="username">
                    <label>Nombre</label><input type="text" name="name">
                    <label>e-mail</label><input type="text" name="email">
                    <label>Contraseña</label><input type="text" name="password">

                    <input type="submit" value="Actualizar administrador">

                </form>
                <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_users_admin.php"> Volver </a></button>
            </section>
        </div>
    </div>
</body>

</html>
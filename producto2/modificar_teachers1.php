<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <div class="container">

            <section class="card">
                <h3>Modificar profesor</h3>

                <form action="modificar_teachers2.php" method="post">

                    <label>ID</label><input type="text" name="id_teacher">
                    <label>Nombre</label><input type="text" name="name">
                    <label>Apellidos</label><input type="text" name="surname">
                    <label>Teléfono</label><input type="text" name="telephone">
                    <label>DNI</label><input type="text" name="nif">
                    <label>e-mail</label><input type="text" name="email">

                    <input type="submit" value="Actualizar profesor">
                </form>
                <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_teachers.php"> Volver </a></button>
            </section>
        </div>
    </div>
</body>

</html>
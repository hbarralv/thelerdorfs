</html>
<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <div class="container">

            <section class="card">
                <h3>Mi perfil</h3>

                <form action="modificar_students2.php" method="post">

                    <label>ID: </label><input type="text" name="id"><br>
                    <br><label>Usuario: </label><input type="text" name="username"><br>
                    <br><label>Contraseña: </label><input type="text" name="pass"><br>
                    <br><label>e-mail: </label><input type="text" name="email"><br>
                    <br><label>Nombre: </label><input type="text" name="name"><br>
                    <br><label>Apellidos: </label><input type="text" name="surname"><br>
                    <br><label>Teléfono: </label><input type="text" name="telephone"><br>
                    <br><label>DNI: </label><input type="text" name="nif"><br>

                    <br><input type="submit" value="Actualizar datos"><br>

                </form>
                <br><button class="back-button class-button"><a style="text-decoration:none" href="/producto2/index.php"> Volver </a></button>
            </section>
        </div>
    </div>

</body>

</html>
</html>
<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <div class="container">

            <section class="card">
                <h3>Modificar estudiante</h3>

                <form action="modificar_students2.php" method="post">

                <br><label>ID</label><input type="text" name="id"><br>
                <br><label>Usuario</label><input type="text" name="username"><br>
                <br><label>Contraseña</label><input type="text" name="pass"><br>
                <br><label>email</label><input type="text" name="email"><br>
                <br><label>Nombre</label><input type="text" name="name"><br>
                <br><label>Apellidos</label><input type="text" name="surname"><br>
                <br><label>Telefono</label><input type="text" name="telephone"><br>
                <br><label>DNI</label><input type="text" name="nif"><br>
                <br><label>Fecha de registro</label><input type="date" name="date_registered" value="2022-01-01" min="2022-01-01" max="2023-12-31"><br>

                    <input type="submit" value="Actualizar estudiante">

                </form>
                <br><button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_students.php"> Volver </a></button><br>
            </section>
        </div>
    </div>

</body>

</html>
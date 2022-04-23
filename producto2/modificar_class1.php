<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <div class="container">

            <section class="card">
                <h3>Modificar clase</h3>

                <form action="modificar_class2.php" method="post">
                    <br><label>ID Clase: </label><input type="text" name="id_class"><br>
                    <br><label>ID Profesor: </label><input type="text" name="id_teacher"><br>
                    <br><label>ID Curso: </label><input type="text" name="id_course"><br>
                    <br><label>ID Horario: </label><input type="text" name="id_schedule"><br>
                    <br><label>Nombre: </label><input type="text" name="name"><br>
                    <br><label>Color: </label><input type="text" name="color"><br>
                    <br><input type="submit" value="Actualizar clase"><br>
                </form>
                <br><button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_class.php"> Volver </a></button><br>
            </section>
        </div>
    </div>
</body>

</html>
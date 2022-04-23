<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">

        <section class="login-container">
            <h1>Eliminar horario</h1>

            <form action="borrar_schedule2.php" method="post">

                <label>ID Horario: </label><input type="text" name="id_schedule">
                <input type="submit" value="Eliminar horario">
            </form>
            <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_schedule.php"> VOLVER </a></button>
        </section>

    </div>
</body>

</html>
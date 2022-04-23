<html>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <div class="container">

            <section class="card">
                <h3>Modificar horario</h3>

                <form action="modificar_schedule2.php" method="post">

                    <label>Horario</label><input type="text" name="id_schedule">
                    <label>Clase</label><input type="text" name="id_class">
                    <label>Hora de inicio</label><input type="time" name="time_start" min="00:00" max="23:59" step="60">
                    <label>Hora de fin</label><input type="time" name="time_end" min="00:00" max="23:59" step="60">
                    <label>Día</label><input type="date" name="day" value="2022-01-01" min="2022-01-01" max="2023-12-31">

                    <input type="submit" value="Actualizar horario">

                </form>
                <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_schedule.php"> Volver </a></button>
            </section>
        </div>
    </div>
</body>

</html>
<html>

<head>
    <title>Actualizar curso</title>
</head>

<body>
    <?php require 'header.php' ?>
    <div class="main-container">
        <div class="container">
            <section class="card">

                <h1>Modificar curso</h1>
                <form action="modificar_courses2.php" method="post">
                    <label>ID Curso</label><input type="text" name="id_course">
                    <label>Nombre</label><input type="text" name="name">
                    <label>Descripción</label><input type="text" name="description">
                    <label>Fecha de inicio</label><input type="date" name="date_start" value="2022-01-01" min="2022-01-01" max="2023-12-31">
                    <label>Fecha de finalización</label><input type="date" name="date_end" value="2022-01-01" min="2022-01-01" max="2023-12-31">
                    <label>¿Activo?</label><select name="active">
                        <option value=0>No</option>
                        <option value=1>Sí</option>
                        <input type="submit" value="Actualizar curso">
                </form>
                <button class="back-button class-button"><a style="text-decoration:none" href="/producto2/select_courses.php"> Volver </a></button>
</body>

</html>
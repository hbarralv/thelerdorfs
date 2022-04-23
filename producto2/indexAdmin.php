<?php
session_start();

require 'database.php';

if (isset($_SESSION['admin_user_id'])) {

  $records = $conn->prepare('SELECT id_user_admin, name, email, password FROM users_admin WHERE id_user_admin = :id_user_admin');
  $records->bindParam(':id_user_admin', $_SESSION['admin_user_id']);
  $records->execute();
  $resultsAdmin = $records->fetch(PDO::FETCH_ASSOC);
  $userAdmin = null;

  if (count($resultsAdmin) > 0) {
    $userAdmin = $resultsAdmin;
  }
}

?>

<!DOCTYPE html>
<html>

<body>

  <?php require 'header.php' ?>

  <?php if (empty($userAdmin)) : ?>
    <div class="main-container">

      <section class="card">

        <h2>¡Bienvenido! Por favor, inicie sesión o regístrese.</h2>

        <div class="enlaces">
          <a class="link" href="loginAdmin.php">
            <h4>Iniciar sesión</h4>
          </a>
          <a class="link" href="registerAdmin.php">
            <h4>Registrarse</h4>
          </a>
        </div>
      <?php else : ?>

        <div class="main-container">

          <section class="card">
            <h2>Panel de administrador</h2>
            <div class="enlaces enlaces-admin">
              <a class="link" href="select_enrollment.php">
                <h4>Matrículas</h4>
              </a>
              <a class="link" href="select_schedule.php">
                <h4>Horarios</h4>
              </a>
              <a class="link" href="select_students.php">
                <h4>Estudiantes</h4>
              </a>
              <a class="link" href="select_teachers.php">
                <h4>Profesores</h4>
              </a>
              <a class="link" href="select_users_admin.php">
                <h4>Administradores</h4>
              </a>
            </div>

            <a href="logout.php">
              <p>Cerrar sesión</p>
            </a>
          </section>

        </div>
      <?php endif; ?>

</body>

</html>
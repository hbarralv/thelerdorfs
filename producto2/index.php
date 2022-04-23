<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT id, email, pass, name FROM students WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $user = null;

  if (count($results) > 0) {
    $user = $results;
  }
}

?>

<!DOCTYPE html>
<html>

<body>

  <?php require 'header.php' ?>

  <?php if (!empty($user)) : ?>

    <div class="main-container">
      <section class="card">
        <h2>Gestionar horarios</h2>
        <div class="enlaces">
          <a class="link" href="select_class.php">
            <h4>Mis clases</h4>
          </a>
          <a class="link" href="select_courses.php">
            <h4>Mis cursos</h4>
          </a>
        </div>
        <a class="link" href="editProfile.php">
          <h4>Mi perfil</h4>
        </a>
        <a class="link" href="logout.php">
          <h4>Cerrar sesión</h4>
        </a>
      </section>

    </div>


  <?php else : ?>
    <div class="main-container">

      <section class="card">

        <h2>¡Bienvenido!</h2>

        <div class="enlaces">
          <a class="link" href="login.php">
            <h4>Iniciar sesión</h4>
          </a>
          <h4><span>¿No tienes una cuenta?</span>
            <a class="link" href="register.php">
              ¡Regístrate!
          </h4>
          </a>
        </div>
      </section>

    </div>
  <?php endif; ?>

</body>

</html>
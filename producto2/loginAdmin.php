<?php

session_start();

require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id_user_admin, email, password FROM users_admin WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);
  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
    $_SESSION['admin_user_id'] = $results['id_user_admin'];
    header("location: indexAdmin.php");
  } else {
    $message = 'Usuario o Contraseña incorrecto';
  }
}

?>

<!DOCTYPE html>
<html>

<body>

  <div class="container">

    <section class="login-container">

      <h1 class="title">Inicio de sesión como administrador</h1>


      <form action="loginAdmin.php" method="POST">
        <input name="email" type="text" placeholder="e-mail">
        <input name="password" type="password" placeholder="contraseña">
        <input type="submit" value="Login">
      </form>

      <?php if (!empty($message)) : ?>
        <p> <?= $message ?></p>
      <?php endif; ?>

      <span><a href="login.php">Iniciar sesión como usuario</a></span><br>
      <span>¿Aún no estas registrado? <a href="registerAdmin.php">¡Regístrate!</a></span>
    </section>

  </div>

</body>

</html>
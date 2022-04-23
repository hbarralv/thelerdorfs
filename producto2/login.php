<?php

session_start();

require 'database.php';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $records = $conn->prepare('SELECT id, email, pass FROM students WHERE email = :email');
  $records->bindParam(':email', $_POST['email']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $message = '';

  if (count($results) > 0 && password_verify($_POST['password'], $results['pass'])) {
    $_SESSION['user_id'] = $results['id'];
    header("location: /producto2");
  } else {
    $message = 'ERROR: Por favor, introduzca las credenciales de nuevo.';
  }
}

?>

<!DOCTYPE html>
<html>

<body>

  <div class="container">

    <section class="login-container">

      <h1>Iniciar sesión</h1>


      <form action="login.php" method="POST">
        <input name="email" type="text" placeholder="e-mail">
        <input name="password" type="password" placeholder="contraseña">
        <input type="submit" value="Login">
      </form>

      <?php if (!empty($message)) : ?>
        <p> <?= $message ?></p>
      <?php endif; ?>

      <span><a href="loginAdmin.php">Iniciar sesión como administrador</a></span><br>
      <span>¿Aún no estas registrado? <a href="register.php">¡Regístrate!</a></span>
    </section>

  </div>

</body>

</html>
<?php

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['password'])) {
  $sql = "INSERT INTO users_admin(username, name, email, password)
    values(:username, :name, :email, :password)";

  $sql = $conn->prepare($sql);

  $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

  $username = $_POST['username'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $pass = $_POST['password'];

  $sql->bindParam(':username', $username, PDO::PARAM_STR, 100);
  $sql->bindParam(':name', $name, PDO::PARAM_STR, 100);
  $sql->bindParam(':email', $email, PDO::PARAM_STR, 100);
  $sql->bindParam(':password', $password, PDO::PARAM_STR, 100);

  if ($sql->execute()) {
    $message = 'Administrador registrado correctamente!';
  } else {
    $message = 'ERROR: No ha sido posible completar el registro.';
  }
}

?>
<!DOCTYPE html>
<html>

<body>

  <div class="container">

    <?php if (!empty($message)) : ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <section class="login-container">
      <h1>Registro de administrador</h1>

      <form action="registerAdmin.php" method="POST">
        <br><label>Nombre: </label>
        <input type="text" name="name"><br>

        <br><label>Usuario: </label>
        <input type="text" name="username"><br>

        <br><label>e-mail: </label>
        <input type="text" name="email"><br>

        <br><label>Contraseña: </label>
        <input type="password" name="password"><br>

        <br><input type="submit" value="Registrarme como administrador"><br>
      </form>

      <br><span>¿Ya tienes una cuenta como administrador? <a href="loginAdmin.php">Iniciar sesión</a></span>

    </section>

  </div>
</body>

</html>
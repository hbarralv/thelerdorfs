<?php

require 'database.php';

$message = '';

if (!empty($_POST['email']) && !empty($_POST['pass'])) {
  $sql = "INSERT INTO students(username, pass, email, name, surname, telephone, nif, date_registered)
    values(:username, :pass, :email, :name, :surname, :telephone, :nif, :date_registered)";

  $sql = $conn->prepare($sql);

  $password = password_hash($_POST['pass'], PASSWORD_BCRYPT);

  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pass = $_POST['pass'];
  $telephone = $_POST['telephone'];
  $nif = $_POST['nif'];
  $date_registered = '2022-01-01 00:00:00';

  $sql->bindParam(':name', $name, PDO::PARAM_STR, 100);
  $sql->bindParam(':username', $username, PDO::PARAM_STR, 100);
  $sql->bindParam(':pass', $password, PDO::PARAM_STR, 100);
  $sql->bindParam(':email', $email, PDO::PARAM_STR, 100);
  $sql->bindParam(':surname', $surname, PDO::PARAM_STR, 100);
  $sql->bindParam(':telephone', $telephone, PDO::PARAM_STR, 100);
  $sql->bindParam(':nif', $nif, PDO::PARAM_STR, 100);
  $sql->bindParam(':date_registered', $date_registered, PDO::PARAM_STR, 100);

  if ($sql->execute()) {
    $message = '¡Usuario registrado correctamente!';
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
      <h1>Registro de usuario</h1>

      <form action="register.php" method="POST">
        <label>Nombre</label>
        <input type="text" name="name"><br>

        <label>Apellidos</label>
        <input type="text" name="surname"><br>

        <label>Usuario</label>
        <input type="text" name="username"><br>

        <label>Teléfono</label>
        <input type="text" name="telephone"><br>

        <label>DNI</label>
        <input type="text" name="nif"><br>

        <label>e-mail</label>
        <input type="text" name="email"><br>

        <label>Contraseña</label>
        <input type="password" name="pass"><br>

        <input type="submit" value="Completar registro">
      </form>

      <span>¿Ya tienes una cuenta? <a href="login.php">Iniciar sesión</a></span>

    </section>

  </div>
</body>

</html>
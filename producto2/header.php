<header class="header">
<?php if (!empty($user)) : ?>

    <p class="welcome">Sesión iniciada como <?= $user['name']; ?></p>

  <?php endif; ?>
</header>
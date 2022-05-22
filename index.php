<?php
// import helpers
require('helpers.php')

?>

<nav>
    <?php if ($user) : ?>
        <?= $user["email"] ?>
        <a href="logout.php">Logout</a>
    <?php else : ?>
        <a href="register.php">Register</a>
        <a href="login.php">Login</a>
    <?php endif ?>
</nav>

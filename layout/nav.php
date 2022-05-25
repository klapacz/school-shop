<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php'; ?>

<nav>
    <a href="/product/">Products</a>
    <div class="auth">
        <?php if ($user) : ?>
            <a href="/basket">Basket</a>
            <?= $user["email"] ?>
            <a href="/auth/logout.php">Logout</a>
        <?php else : ?>
            <a href="/auth/register.php">Register</a>
            <a href="/auth/login.php">Login</a>
        <?php endif ?>
    </div>
</nav>

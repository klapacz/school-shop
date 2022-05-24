<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php'; ?>

<style>
    nav {
        border-bottom: 2px solid #000;
        display: flex;
        justify-content: space-between;
    }

    nav a {
        display: block;
        padding: 1rem;
    }   

    nav .auth {
        display: flex;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>

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

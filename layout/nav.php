<?php require('helpers.php'); ?>

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
    <a href="/shop/product/">Products</a>
    <div class="auth">
        <?php if ($user) : ?>
            <?= $user["email"] ?>
            <a href="logout.php">Logout</a>
        <?php else : ?>
            <a href="register.php">Register</a>
            <a href="login.php">Login</a>
        <?php endif ?>
    </div>
</nav>

<?php

// import $db variable
require('db.php');
// import helpers
require('helpers.php');

if ($method == 'POST') {
    $required_fields = ["email", "password"];
    validate($errors, $values, $required_fields);

    // if there are no errors we are good to go
    if (empty($errors)) {
        $sth = $db->prepare('SELECT first_name, last_name, password, email FROM users WHERE email = ?');
        $sth->execute([$values['email']]);
        $user = $sth->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($values['password'], $user['password'])) {
            login($user);
        } else {
            $errors['email'] = "Invalid email or password.";
        }
    }
}

?>

<form method="POST">
    <h1>Log in</h1>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <?= isset($errors["email"]) ? "<span class=error>" . $errors['email'] . "</span" : "" ?>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <?= isset($errors["password"]) ? "<span class=error>" . $errors['password'] . "</span" : "" ?>
    </div>
    
    <button type="submit">Log in</button>
</form>
<?php

// import $db variable
require('db.php');
// import helpers
require('helpers.php');

if ($method == 'POST') {
    $required_fields = ["email", "first_name", "last_name", "password"];
    validate($errors, $values, $required_fields);

    // if there are no errors we are good to go
    if (empty($errors)) {
        // hash password
        $values['password'] = password_hash($values['password'], PASSWORD_DEFAULT);

        $sth = $db->prepare(
            'INSERT INTO users (email, first_name, last_name, password) VALUES (:email, :first_name, :last_name, :password)'
        );

        try {
            $sth->execute($values);
        } catch (PDOException $e) {
            $errors['email'] = "Email is already taken.";
        }
    }
}

?>

<form method="POST">
    <h1>Register</h1>

    <div>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <?= isset($errors["email"]) ? "<span class=error>" . $errors['email'] . "</span" : "" ?>
    </div>

    <div>
        <label for="first_name">First name</label>
        <input type="text" name="first_name" id="first_name" required>
        <?= isset($errors["first_name"]) ? "<span class=error>" . $errors['first_name'] . "</span" : "" ?>
    </div>

    <div>
        <label for="last_name">Last name</label>
        <input type="text" name="last_name" id="last_name" required>
        <?= isset($errors["last_name"]) ? "<span class=error>" . $errors['last_name'] . "</span" : "" ?>
    </div>

    <div>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required>
        <?= isset($errors["password"]) ? "<span class=error>" . $errors['password'] . "</span" : "" ?>
    </div>
    
    <button type="submit">Register</button>
</form>
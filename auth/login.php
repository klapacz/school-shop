<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php';

if ($method == 'POST') {
    $required_fields = ["email", "password"];
    validate($errors, $values, $required_fields);

    // if there are no errors we are good to go
    if (empty($errors)) {
        $sth = $db->prepare('SELECT first_name, last_name, password, email, id FROM users WHERE email = ?');
        $sth->execute([$values['email']]);
        $user_in_db = $sth->fetch(PDO::FETCH_ASSOC);

        if ($user_in_db && password_verify($values['password'], $user_in_db['password'])) {
            login($user_in_db);
        } else {
            $errors['email'] = "Invalid email or password.";
        }
    }
}

?>

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php'; ?>

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

<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php'; ?>
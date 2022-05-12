<?php

$errors = [];

if (!empty($_POST)) {
    // iterate over required fields and check if are not empty
    $fields = ["email", "first_name", "last_name"];
    foreach ($fields as $field) {
        if (!isset($_POST[$field]) || empty($_POST[$field])) {
            $errors[$field] = "The {$field} field is required.";
        }
    }

    // if there are no errors we are good to go
    if (empty ($errors)) {
        $email = $_POST["email"];
        $first_name = $_POST["first_name"];
        $last_name = $_POST["last_name"];
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
    
    <button type="submit">Register</button>
</form>
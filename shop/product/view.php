<?php
require('../../helpers.php');
require('../../db.php');

if (empty($_GET['id'])) {
    header('Location: /shop/product/');
    return;
}

$sth = $db->prepare('SELECT id, name, price, availability FROM products WHERE id = :id');
$sth->execute([ "id" => $_GET['id'] ]);
$product = $sth->fetch(PDO::FETCH_ASSOC);

// TODO: error handling
?>

<h1> Product <?= $product["name"] ?></h1>

<p>Price: <?= $product["price"] / 100 ?>zł</p>
<p>Availability: <?= $product["availability"] / 100 ?>zł</p>


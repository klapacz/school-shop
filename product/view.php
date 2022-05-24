<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php';

if (empty($_GET['id'])) {
    header('Location: /product/');
    return;
}

$sth = $db->prepare('SELECT id, name, price, availability FROM products WHERE id = :id');
$sth->execute([ "id" => $_GET['id'] ]);
$product = $sth->fetch(PDO::FETCH_ASSOC);
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/nav.php'; ?>

<?php if (!$product) : ?>
    <h1>Product not found</h1>
<?php else : ?>
    <h1> Product <?= $product["name"] ?></h1>

    <p>Price: <?= $product["price"] / 100 ?>zł</p>
    <p>Availability: <?= $product["availability"] ?></p>
<?php endif ?>


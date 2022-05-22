<?php
 
require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php';

$sth = $db->prepare('SELECT id, name, price FROM products');
$sth->execute();
$products = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<style>
    table, th, td {
        border: 1px solid #000;
        border-collapse: collapse;
    }

    td, th {
        padding: .5rem;
    }
</style>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/nav.php'; ?>

<h1>Products</h1>

<table>
    <thead>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <td><?= $product["name"] ?></td>
            <td><?= $product["price"] / 100 ?>zł</td>
            <td>
                <a href="/shop/product/view.php?id=<?= $product["id"] ?>">View</a>
            </td>
        <?php endforeach ?>
    </tbody>
</table>
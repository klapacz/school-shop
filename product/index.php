<?php
 
require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php';

$sth = $db->prepare('SELECT id, name, price FROM products');
$sth->execute();
$products = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php'; ?>

<h1>Products</h1>

<table>
    <thead>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product["name"] ?></td>
                <td><?= $product["price"] / 100 ?>zł</td>
                <td>
                    <a href="/product/view.php?id=<?= $product["id"] ?>">View</a>
                    <a href="/basket/add.php?product_id=<?= $product["id"] ?>">Add to basket</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php'; ?>
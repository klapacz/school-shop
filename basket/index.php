<?php
 
require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/basket.php';

$order_id = get_or_create_basket();

$sth = $db->prepare('SELECT orders_products.count, orders_products.id, products.name, products.price FROM orders_products JOIN products ON products.id = orders_products.product_id WHERE orders_products.order_id = :order_id');
$sth->execute([
    "order_id" => $order_id,
]);
$products = $sth->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/header.php'; ?>

<h1>Basket</h1>

</div>

<table>
    <thead>
        <th>Count</th>
        <th>Name</th>
        <th>Price</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?= $product["count"] ?></td>
                <td><?= $product["name"] ?></td>
                <td><?= $product["price"] / 100 ?>zł</td>
                <td>
                    <a href="/basket/remove.php?id=<?= $product["id"] ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/layout/footer.php'; ?>
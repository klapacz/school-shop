<?php
 
require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/basket.php';

$basket_id = get_or_create_basket();

$sth = $db->prepare('SELECT orders_products.count, orders_products.id, products.name, products.price FROM orders_products JOIN products ON products.id = orders_products.product_id WHERE orders_products.order_id = 1');
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

<h1>Basket</h1>

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
                    TODO: remove from basket
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>

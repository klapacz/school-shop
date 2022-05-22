<?php
require('../../helpers.php');
require('../../db.php');

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

<table>
    <thead>
        <th>name</th>
        <th>price</th>
    </thead>
    <tbody>
        <?php foreach ($products as $product) : ?>
            <td><?= $product["name"] ?></td>
            <td><?= $product["price"] / 100 ?>zł</td>
        <?php endforeach ?>
    </tbody>
</table>
<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/basket.php';

if(!isset($_GET["id"])) {
    // TODO: better error handling
    die("No orders_products id given");
}
$orders_products_id = $_GET["id"];

$order_id = get_or_create_basket();

$sth = $db->prepare('DELETE FROM orders_products WHERE id = :orders_products_id AND order_id = :order_id');
$sth->execute([
    "orders_products_id" => $orders_products_id,
    "order_id" => $order_id,
]);

header('Location: /basket/');

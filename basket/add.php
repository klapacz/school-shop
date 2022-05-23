<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers/basket.php';

if(!isset($_GET["product_id"])) {
    // TODO: better error handling
    die("No product id given");
}
$product_id = $_GET["product_id"];
$count = isset($_GET["count"]) ? $_GET["count"] : 1;

$order_id = get_or_create_basket();

$sth = $db->prepare('INSERT INTO orders_products (count, product_id, order_id) VALUES (:count, :product_id, :order_id)');
$sth->execute([
    "count" => $count,
    "product_id" => $product_id,
    "order_id" => $order_id,
]);

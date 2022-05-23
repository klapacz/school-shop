<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php';

if(!isset($_GET["product_id"])) {
    // TODO: better error handling
    die("No product id given");
}
$product_id = $_GET["product_id"];
$count = isset($_GET["count"]) ? $_GET["count"] : 1;

function get_or_create_basket()
{
    global $db;
    global $user;

    // get basket id
    $sth = $db->prepare("SELECT id FROM orders WHERE user_id = :user_id AND status = 'PENDING'");
    $sth->execute([
        // TODO: check if user is logged in
        "user_id" => $user["id"]
    ]);
    $basket = $sth->fetch(PDO::FETCH_ASSOC);

    if ($basket) {
        $order_id = $basket["id"];
    } else {
        // create new basket
        $sth = $db->prepare("INSERT INTO orders (user_id, status) VALUES (:user_id, 'PENDING')");
        $sth->execute([
            "user_id" => $user["id"]
        ]);
        $order_id = $db->lastInsertId();
    }

    return $order_id;
}

$order_id = get_or_create_basket();

$sth = $db->prepare('INSERT INTO orders_products (count, product_id, order_id) VALUES (:count, :product_id, :order_id)');
$sth->execute([
    "count" => $count,
    "product_id" => $product_id,
    "order_id" => $order_id,
]);

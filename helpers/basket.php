<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/helpers.php';

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

<?php

$cart = array();
if (isset($_SESSION["cart"])) {
    $cart = json_decode($_SESSION["cart"], true);
    if (json_last_error() == JSON_ERROR_NONE && is_array($cart)) {
        foreach ($cart as $elem) {
            if (!is_int($elem)) {
                $cart = array();
                break;
            }
        }
    }
}

function getCart(): array {
    global $cart;
    return $cart;
}

function addCartProduct(int $prodId, int $quantity = 1) {
    global $cart;

    if (isset($cart[$prodId]))
        $cart[$prodId] += $quantity;
    else
        $cart[$prodId] = $quantity;

    if ($cart[$prodId] <= 0)
        removeCartProduct($prodId);
    else
        $_SESSION["cart"] = json_encode($cart);
}

function setCartProductCount(int $prodId, int $quantity) {
    if ($quantity <= 0) return removeCartProduct($prodId);
    global $cart;
    $cart[$prodId] = $quantity;
    $_SESSION["cart"] = json_encode($cart);
}

function removeCartProduct(int $prodId) {
    global $cart;
    unset($cart[$prodId]);
    $_SESSION["cart"] = json_encode($cart);
}

function clearCart() {
    global $cart;
    $cart = array();
    unset($_SESSION["cart"]);
}

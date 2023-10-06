<?php
session_start();
extract($_POST);
foreach ($qty as $product_id => $quantity) {
    if ($quantity <= 0) {
        unset($_SESSION['cart'][$product_id]);
        continue;
    }
    $_SESSION['cart'][$product_id]["qty"] = $quantity;
    $_SESSION['cart'][$product_id]["subtotal"] = $quantity * $_SESSION['cart'][$product_id]["price"];
}
$_SESSION['message'] = "<h5 class='text-center text-primary fst-italic mt-4 mb-2'>Cart Updated</h5>";
header("location:cart.php");

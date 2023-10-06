<?php
session_start();
extract($_GET);
$_SESSION['message'] = "<p class='h5 text-center text-danger fst-italic'>" . $_SESSION['cart'][$id]["name"] . " removed from cart</p>";
// $_SESSION['message'] =
//                     "<div class='alert alert-danger' role='alert'>
//                         <p class='text-center text-danger fst-italic'>" . $_SESSION['cart'][$id]["name"] . " removed from cart</p>
//                     </div>";
unset($_SESSION['cart'][$id]);
header("location:cart.php");

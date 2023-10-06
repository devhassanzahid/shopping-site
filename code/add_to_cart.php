<?php
include("connection.php");
include("header.php");

session_start();
extract($_GET);

$sql = "SELECT * from products where id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$max_qty = $row['quantity'];

if (($qty > $max_qty) && isset($_SESSION['cart']) && $_SESSION['cart'][$row['id']]) {
    // $_SESSION['message'] = "<div class='d-flex justify-content-center text-center alert alert-danger fst-italic w-25'>Limit Exceeded!</div>";
    $_SESSION['message'] = "
                    <div class='d-flex justify-content-center'>
                        <p class='text-center alert alert-warning w-25 mt-1'>
                        <i class='bi bi-emoji-neutral'></i> Invalid Limit but you already have<strong><em> " . $row['title'] . " </em></strong>in cart <a href='cart.php' target='_blank' class='btn btn-sm btn-outline-primary'><i class='bi bi-cart'></i> View Cart</a>
                        </p>
                    </div>";
    header("location:customer_dashboard.php");
    exit;
}

if (($qty > $max_qty)) {
    $_SESSION['message'] = "
        <div class='d-flex justify-content-center'>
            <p class='text-center alert alert-danger w-50 mt-1'>
             <em><i class='bi bi-emoji-grimace'></i> Limit Exceeded!</em> Please select quantity within available range (i.e., <em>$max_qty</em>) 
            </p>
        </div>
    ";
    header("location:customer_dashboard.php");
    exit;
}

if (isset($_SESSION['cart']) && $_SESSION['cart'][$row['id']]) {
    // $_SESSION['message'] = "<h5 class='text-center text-success fst-italic'>" . $row['title'] . " already added in cart</h5>";
    $_SESSION['message'] = "
        <div class='d-flex justify-content-center'>
            <p class='text-center alert alert-primary w-25 mt-1'>
               <em>" . $row['title'] . "</em> already added to cart" . " <a href='cart.php' target='_blank' class='btn btn-sm btn-outline-primary'><i class='bi bi-cart'></i> View Cart</a>
            </p>
        </div>
    ";
    header("location:customer_dashboard.php");
    exit;
}

$product = array("id" => $id, "name" => $row['title'], "qty" => $qty, "price" => $row['price'], "subtotal" => ($qty * $row['price']));

// var_dump($product);

$_SESSION['cart'][$row['id']] = $product;

// $_SESSION['cart'][]=$product;
// $_SESSION['message']=$row['title']. " added to cart";

// $_SESSION['message'] = "<h5 class='text-center text-success fst-italic'>" . $row['title'] . " added to cart successfully <span class='fst-normal'><a href='cart.php' target='_blank' class='btn btn-sm btn-outline-primary'>View Cart</a></h5>";

$_SESSION['message'] = "<div class='d-flex justify-content-center'>
                        <p class='text-center alert alert-success w-25 mt-1'>
                        <i class='bi bi-emoji-smile'></i> <strong><em>" . $row['title'] . "</em></strong> added successfully to cart <a href='cart.php' target='_blank' class='btn btn-sm btn-outline-primary'><i class='bi bi-cart'></i> View Cart</a>
                        </p>
                      </div>";

header("location:customer_dashboard.php");

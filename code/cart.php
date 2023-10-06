<title>Cart</title>
<?php
include("header.php");
include("connection.php");
session_start();
?>
<h1 class="text-center mt-5"><i class="bi bi-cart"></i> Cart</h1>
<?php

if (isset($_SESSION['message'])) {
    echo $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<?php
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $total_amount = 0;
?>
    <form action="update_cart.php" method="post">
        <table class="container table table-hover table-striped mt-5">
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Unit Price</th>
                <th>Sub-total</th>
                <th class="text-center">Actions</th>
            </tr>
            <?php
            foreach ($_SESSION['cart'] as $key => $value) {
            ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td class="w-25">
                        <input class="form-control w-25" type="number" name="qty[<?php echo $value['id'] ?>]" id="qty" value="<?php echo $value['qty'] ?>"  >
                    </td>
                    <td><?php echo "<strong>$ </strong>" . $value['price'] ?></td>
                    <td><?php echo "<strong>$ </strong>" . $value['subtotal'] ?>
                    </td>
                    <td class="text-center">
                        <a href="remove_from_cart.php?id=<?php echo $value['id'] ?>" class="btn btn-danger">
                            <i class="bi bi-trash3"></i>
                        </a>
                    </td>
                </tr>
            <?php
                $total_amount += ($value['qty'] * $value['price']);
            }
            ?>
            <tr class="fst-italic">
                <td colspan="3"></td>
                <td class="text-start"><strong>Total Items: </strong></td>
                <td><?php echo count($_SESSION['cart']) ?></td>
                <td></td>
            </tr>
            <tr class="fst-italic">
                <td colspan="3"></td>
                <td class="text-start"><strong>Total Amount: </strong></td>
                <td><strong>$ </strong><?php echo $total_amount ?></td>
                <td></td>
            </tr>
        </table>
        <div class="container mt-3 mb-3 text-end d-flex justify-content-end">
            <a href="empty_cart.php" class="btn btn-danger">
                <i class="bi bi-trash"></i> Empty Cart
            </a>
            &nbsp;
            <button class="btn btn-primary" type="submit">
                <i class="bi bi-pencil-square"></i> Update Cart
            </button>
            &nbsp;
            <a href="checkout.php" class="btn btn-success" target="_blank">
                <i class="bi bi-bag-check"></i> Checkout
            </a>
        </div>
    <?php
} else {
    echo "
            <p class='text-center h5 mt-4'>
                There is nothing to show in cart <em><a href='customer_dashboard.php'>Go for Shopping</a></em>
            </p>";
}
    ?>
    </form>
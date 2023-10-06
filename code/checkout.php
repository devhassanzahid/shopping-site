<title>Checkout</title>
<?php
include("header.php");
extract($_GET);
session_start();
?>
<h1 class="text-center mt-5 mb-2"><i class="bi bi-bag-check"></i> Checkout</h1>
<?php
if (isset($_SESSION['cart'])) {
    $final_amount = 0;

?>
    <table class="container mt-5 table table-striped">
        <tr>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Sub-total</th>
        </tr>
        <?php
        foreach ($_SESSION['cart'] as $key => $value) {
        ?>
            <tr>
                <td><?php echo $value['id']; ?></td>
                <td><?php echo $value['name']; ?></td>
                <td><?php echo $value['qty']; ?></td>
                <td><?php echo "<strong>$</strong>" . $value['price']; ?></td>
                <td><?php echo "<strong>$</strong>" . $value['subtotal']; ?></td>
            </tr>
    <?php
            $final_amount += ($value['qty'] * $value['price']);
        }
    }
    ?>
    <tr class="fst-italic">
        <td colspan="3"></td>
        <th>Total Price</th>
        <td><?php echo "<strong>$</strong>" . $final_amount; ?></td>
    </tr>
    </table>
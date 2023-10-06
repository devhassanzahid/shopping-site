<title>Thank You!</title>
<?php
include("header.php");
?>
<h1 class="text-center mt-5 mb-3">
    <i class="bi bi-emoji-smile "></i><br />
    Thank You for placing order
</h1>
<p class="text-center mt-3">
    You may track your order using your unique <strong>TRACKING ID: #</strong>
    <u>
        <?php
        echo uniqid("ORDER");
        ?>
    </u>
</p>
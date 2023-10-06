<title>Checkout</title>
<?php
include("header.php");
include("connection.php");
session_start();
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $total_amount = 0;
?>
    <div class="container">
        <div class="mt-5 mb-1">
            <p class="h1 text-center fst-italic"><i class="bi bi-bag-check"></i> Checkout</p>
        </div>
        <div class="row mt-2">
            <div class="col-6 mt-4">
                <form class="row g-3">
                    <div class="col">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname">
                    </div>
                    <div class="col">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname">
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">Phone Number</label>
                        <input type="phone" class="form-control" id="phone">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" id="address" placeholder="1234 Main St" rows="4"></textarea>
                    </div>
                    <div class="col-12">
                        <label for="address2" class="form-label">Address 2</label>
                        <textarea class="form-control" id="address2" placeholder="Apartment, studio, or floor" rows="3"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city">
                    </div>
                    <div class="col-md-4">
                        <label for="state" class="form-label">State / Province</label>
                        <select id="state" class="form-select">
                            <option selected>Choose...</option>
                            <option>Azad Jammu and Kashmir</option>
                            <option>Balochistan</option>
                            <option>Gilgit-Baltistan</option>
                            <option>Islamabad Capital Territory</option>
                            <option>Khyber Pakhtunkhwa</option>
                            <option>Punjab</option>
                            <option>Sindh</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="zip" class="form-label">Zip</label>
                        <input type="text" class="form-control" id="zip">
                    </div>
                    <div class="col-12">
                        <label for="payment">Payment Method:</label><br />
                        <a href="" target="_blank"><img src="https://ecrlib.org/wp-content/uploads/2023/03/PayPal-Logo.png" class="w-25 rounded" /></a>
                        <a href="" target="_blank"><img src="https://1000logos.net/wp-content/uploads/2021/09/Payoneer-logo.jpg" class="w-25 rounded" /></a>
                        <a href="" target="_blank"><img src="https://st.depositphotos.com/69187398/61591/v/450/depositphotos_615910122-stock-illustration-mastercard-logotype-white-background-mastercard.jpg" class="w-25 rounded" /></a>
                        <!-- <a href="" target="_blank"><img src="https://t4.ftcdn.net/jpg/03/06/84/93/360_F_306849380_IXZ9BtgFsbappUYkDiNKMXv0YLGBEC8N.jpg" class="w-25 rounded" /></a> -->

                    </div>
                    <div class="col-12 mt-4 mb-4 d-flex justify-content-end">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="gridCheck">
                            <label class="form-check-label" for="gridCheck">
                                Remember Me?
                            </label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 mt-5">
                <table class="table container table-hover table-striped">
                    <tr>
                        <th>Product ID</th>
                        <th>Product Title</th>
                        <th>Product Quantity</td>
                        <th>Product Sub-total</th>
                        
                    </tr>
                    <?php
                    foreach ($_SESSION['cart'] as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $value['id'] ?></td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['qty'] ?></td>
                            <td class="fst-italic">
                                <?php
                                $product_subtotal = $value['qty'] * $value['price'];
                                echo "<strong>$</strong>" . $product_subtotal;
                                ?>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
                <tr>

                </tr>
                </table>
            </div>
           
        </div>
        <div class="col-12 text-center mt-4">
            <a href="thank_you_page.php" class="btn btn-lg btn-outline-success fst-italic">Place Order</a>
        </div>
    </div>
    </div>
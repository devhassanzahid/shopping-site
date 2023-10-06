<?php
include("header.php");
include("connection.php");
?>
<title>Available Products</title>
<div class="row">
    <div class="col-md-12">
        <?php
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql) or die();
        if (mysqli_num_rows($result) > 0) {
        ?>
            <h2 class="text-center mt-5 mb-5">
                Available Products<br />
            </h2>
            <?php
            $query = "SELECT COUNT(title) FROM products";
            $count = $conn->query($query);
            $product_count = $count->fetch_assoc()['COUNT(title)'];
            echo "<p><strong>Total Products Available:</strong> " . $product_count . "</p>";
            ?>
            <div class="container-fluid text-center mt-3">
                <div class="row text-center">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-sm-6 col-md-4 col-lg-2 mb-3 mt-4">
                            <div class="card " style="width: 18rem;">
                                <a href="https://www.google.com"> <img src="<?php echo $row['image']; ?>" class="card-img-top img-fluid rounded mx-auto d-block" alt="..."></a>
                                <div class="card-body">
                                    <span class="badge bg-secondary fst-italic bg-danger mt-2 mb-2">Limited Time Offer</span>
                                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                    <p class="card-text"><?php echo "<em>" . $row['desc'] . "</em>"; ?></p>
                                    <p class="card-text"><?php echo "<strong>Price: $</strong>" . $row['price'] . "<br/><strong>Available Quantity: </strong>" . $row['quantity'] ?></p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>&nbsp;&nbsp;&nbsp;
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        <?php
        } else {
            echo "
                    <p class='h2 text-center mt-5 mb-4 text-danger fst-italic'>No record found!</p>
                ";
        }
        ?>
    </div>
</div>
</div>
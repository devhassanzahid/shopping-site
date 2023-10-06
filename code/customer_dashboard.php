<title>Shopping</title>
<?php
session_start();
include("header.php");
include("connection.php");
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>
<style>
    .images {
        width: 200px;
        height: 200px;
        object-fit: cover;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <nav class="container-fluid navbar bg-light navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="text-dark navbar-brand" href="#">
                    <h3 class="fst-italic mt-1">
                        <img src="./images/customer.jpg" alt="" height="40px" width="">&nbsp;&nbsp;Customer Panel
                    </h3>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto text-cente">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="https://maps.google.com/" target="_blank">Maps</a>
                        </li>

                        <li>
                            <a href="cart.php" class="btn btn-success" target="_blank">
                                <i class="bi bi-cart"></i> Cart
                                <span class="badge text-success bg-light">
                                    <?php echo count($_SESSION['cart']) ?>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-danger" href="logout.php">Log Out</a>
            </div>
        </nav>
        <?php
        $sql = "SELECT * FROM products";
        $result = mysqli_query($conn, $sql) or die();
        if (mysqli_num_rows($result) > 0) {
        ?>
            <h2 class="text-center mt-4 mb-3">
                Available Products<br />
            </h2>
            <h6>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </h6>
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
                            <div class="card">
                                <img src="<?php echo $row['image']; ?>" class="images card-img-top img-fluid rounded mx-auto d-block" alt="...">
                                <div class="card-body">
                                    <span class="badge bg-secondary fst-italic bg-danger mt-2 mb-2">Limited Time Offer</span>
                                    <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                    <p class="card-text"><?php echo "<em>" . $row['desc'] . "</em>"; ?></p>
                                    <p class="card-text">
                                        <?php echo "<strong>Price: $</strong>" . $row['price'] . "<br/><strong>Available Quantity: </strong>" . $row['quantity'] ?>
                                    </p>
                                    <form action="add_to_cart.php" method="get">
                                        <input type="number" class="form-control mb-3" name="qty" id="qty" value="1">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <button class="btn btn-primary">Add to Cart</button>
                                    </form>
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
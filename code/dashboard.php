<?php
include("is_auth.php");
include("header.php");
include("connection.php");
?>
<title>Dashboard</title>
<link rel="icon" href="logo.svg" type="image/x-icon">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <nav class="container-fluid navbar bg-light navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <a class="text-dark navbar-brand" href="#">
                        <h3 class="fst-italic ">
                            <img src="./images/admin.jpg" alt="" height="40px" width="">&nbsp;&nbsp;Admin Panel
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
                            <li class="nav-item">
                                <a class="nav-link" href="https://youtube.com" target="_blank">Youtube</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="delete_product.php" target="_blank">Delete Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="update_product.php" target="_blank">Update Products</a>
                            </li>
                        </ul>
                    </div>
                    <a class="btn btn-danger" href="logout.php">Log Out</a>
                </div>
            </nav>
            <h1 class="text-center mt-5 mb-4">Add Products</h1>
            <div class="container">
                <form action="add_product.php" method="post" enctype="multipart/form-data" class="mt-5">
                    <div class="form-control ">
                        <div class="mb-3 mt-3">
                            <input type="text" name="title" id="title" class="form-control fst-italic" placeholder="Product Title">
                        </div>
                        <div class="mb-3 mt-3">
                            <textarea name="desc" id="desc" cols="166" rows="4" placeholder="Product Description" class="form-control fst-italic"></textarea>
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="file" name="image" id="image" class="form-control fst-italic" placeholder="Product Image">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="number" name="price" id="price" class="form-control fst-italic" placeholder="Product Price">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="number" name="quantity" id="quantity" class="form-control fst-italic" placeholder="Product Quantity">
                        </div>
                        <div class="text-center mt-3 mb-3">
                            <button class="btn btn-success" type="submit">Add Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php
            $sql = "SELECT * FROM products";
            $result = mysqli_query($conn, $sql) or die();
            if (mysqli_num_rows($result) > 0) {
            ?>
                <h2 class="text-center mt-5 mb-3">
                    Available Products<br />
                    <a href="delete_all_products.php" class="text-center btn btn-danger mt-4">Delete All Products</a>
                </h2>
                <?php
                $query = "SELECT COUNT(title) FROM products";
                $count = $conn->query($query);
                $product_count = $count->fetch_assoc()['COUNT(title)'];
                echo "<strong>Total Products Available:</strong> " . $product_count;
                ?>
                <div class="container-fluid text-center mt-3">
                    <div class="row text-center">
                        <?php
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <div class="col-sm-6 col-md-4 col-lg-2 mb-3 mt-4">
                                <div class="card " style="width: 18rem;">
                                    <img src="<?php echo $row['image']; ?>" class="card-img-top" alt="..." height="200px" width="200px">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $row['title']; ?></h5>
                                        <p class="card-text"><?php echo "<em>" . $row['desc'] . "</em>"; ?></p>
                                        <p class="card-text"><?php echo "<strong>Price: $</strong>" . $row['price'] . "<br/><strong>Available Quantity: </strong>" . $row['quantity'] ?></p>

                                        <!-- <a href="#" class="btn btn-primary">Add to Cart</a>&nbsp;&nbsp;&nbsp; -->

                                        <a href="update_product_interface.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update </a>
                                        <a href="delete_product.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete </a>
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
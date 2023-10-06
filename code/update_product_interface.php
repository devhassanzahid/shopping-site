<?php
include("is_auth.php");
include("header.php");
include("connection.php");
?>
<title>Update Product</title>
<link rel="icon" href="logo.svg" type="image/x-icon">
<?php echo "<strong>Product ID: </strong>" . $_GET['id']; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="text-center mt-5 mb-4">Update Product</h1>
            <div class="container">
                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM products WHERE id='$id'";
                $result = mysqli_query($conn, $sql);
                $result_data = mysqli_fetch_assoc($result);
                ?>
                <form action="update_product.php" method="post" class="mt-5" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $result_data['id'] ?>">
                    <div class="form-control ">
                        <div class="mb-3 mt-3">
                            <input type="text" name="title" id="title" class="form-control fst-italic" value="<?php echo $result_data['title']; ?>" placeholder="Product Title">
                        </div>
                        <div class="mb-3 mt-3">
                            <textarea name="desc" id="desc" cols="166" rows="4" value="<?php echo $result_data['desc']; ?>" placeholder="Product Description" class="form-control fst-italic"><?php echo $result_data['desc']; ?></textarea>
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="file" name="image" id="image" value="<?php echo $result_data["image"] ?>" class="form-control fst-italic" placeholder="Product Image">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="number" name="price" id="price" value="<?php echo $result_data['price']; ?>" class="form-control fst-italic" placeholder="Product Price">
                        </div>
                        <div class="mb-3 mt-3">
                            <input type="number" name="quantity" id="quantity" value="<?php echo $result_data['quantity']; ?>" class="form-control fst-italic" placeholder="Product Quantity">
                        </div>
                        <div class="text-center mt-3 mb-3">
                            <button class="btn btn-primary" type="submit">Update Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
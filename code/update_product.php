<?php
include("connection.php");
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $fileTmpPath = $_FILES['image']['tmp_name'];
    $fileName = $_FILES['image']['name'];
    $uploadDirectory = 'uploads/';
    $destPath = $uploadDirectory . $fileName;
    move_uploaded_file($fileTmpPath, $destPath);
} else {
}
$id = $_POST['id'];
$title = $_POST['title'];
$desc = $_POST['desc'];
// $image = $_POST['image'];
$_POST['image'] = $destPath;
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$sql = "SELECT image FROM products WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$existingImagePath = $row['image'];

if (!isset($destPath)) {
    $_POST['image'] = $existingImagePath;
    $sql = "UPDATE products SET title='$title', `desc`='$desc', `image`='$existingImagePath', price='$price', quantity='$quantity' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // echo "Record updated successfully";
        $_SESSION['message'] = "Product Updated Successfully!";
        header("Location: dashboard.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
} else {
    $sql = "UPDATE products SET title='$title', `desc`='$desc', `image`='$destPath', price='$price', quantity='$quantity' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['message'] = "Product Updated Successfully!";
        header("Location: dashboard.php");
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}

<?php
include("connection.php");
include("header.php");
function file_upload()
{
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['image']['name']);
    $upload_ok = 1;
    $image_filetype = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if ($upload_ok == 0) {
        echo "There is an error....";
        return "";
    } else {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo "
                <p class='text-success mt-2 p-2 text-center'>&nbsp;The file <em><strong>" . $_FILES['image']['name'] . "</em></strong> has been uploaded successfully!</p>
                <p class='text-center'>
                    <a href='dashboard.php' class='btn btn-md btn-success'>View Products</a>
                </p>
            ";
            return $target_file;
        } else {
            echo "<p class='h3 mt-2 text-danger fst-italic'>There was something wrong with file!<p>";
        }
    }
}

$title = $_POST['title'];
$desc = $_POST['desc'];
$image = file_upload();
$price = $_POST['price'];
$quantity = $_POST['quantity'];

$sql = "INSERT INTO products VALUES ('','$title','$desc','$image','$price','$quantity')";
if (mysqli_query($conn, $sql)) {
    // echo "\n\nAdded Successfully!";
} else {
    echo "Error Occured!";
}

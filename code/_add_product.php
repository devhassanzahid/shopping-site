<?php
// include("connection.php");
// include("header.php");

// function file_upload()
// {
//     $target_dir = "uploads/";
//     $target_file = $target_dir . basename($_FILES['image']['name']);
//     $uploadOk = 1;
//     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
//     if ($uploadOk == 0) {
//         echo "there is an error in file while uploading";
//         return "";
//     } else {
//         if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
//             echo "This file" . $_FILES['image']['name'] . "has been uploaded";
//             return $target_file;
//         } else {
//             echo "file is not yet uploaded";
//         }
//     }
// }

// // Initialize the $image variable to an empty string
// $image = "";

// $title = $_POST['title'];
// $desc = $_POST['desc'];
// $image = file_upload();
// $price = $_POST['price'];
// $quantity = $_POST['quantity'];

// $sql = "INSERT INTO products VALUES ('','$title','$desc','$image','$price','$quantity')";
// if (mysqli_query($conn, $sql)) {
//     echo "\n\nAdded Successfully!";
// } else {
//     echo "Error Occured!";
// }


include("connection.php");
include("header.php");

function file_upload()
{
    // Get the target directory
    $target_dir = "uploads/";

    // Check if the target directory exists and is writable
    if (!is_dir($target_dir) || !is_writable($target_dir)) {
        echo "The target directory does not exist or is not writable.";
        return "";
    }

    // Get the uploaded file info
    $uploaded_file = $_FILES['image'];

    // Check if the uploaded file is too large
    $max_upload_size = 1024 * 1024 * 2; // 2MB
    if ($uploaded_file['size'] > $max_upload_size) {
        echo "The uploaded file is too large.";
        return "";
    }

    // Check if the uploaded file is a valid image file
    $image_types = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($uploaded_file['type'], $image_types)) {
        echo "The uploaded file is not a valid image file.";
        return "";
    }

    // Generate a unique file name
    $file_name = uniqid() . '.' . pathinfo($uploaded_file['name'], PATHINFO_EXTENSION);

    // Move the uploaded file to the target directory
    if (move_uploaded_file($uploaded_file['tmp_name'], $target_dir . $file_name)) {
        return $target_dir . $file_name;
    } else {
        echo "Failed to upload the file.";
        return "";
    }
}

// Initialize the $image variable to an empty string
$image = "";

$title = $_POST['title'];
$desc = $_POST['desc'];
$image = file_upload();
$price = $_POST['price'];
$quantity = $_POST['quantity'];

// Check if the image was uploaded successfully
if (!$image) {
    echo "Failed to upload the image.";
    exit();
}

$sql = "INSERT INTO products VALUES ('','$title','$desc','$image','$price','$quantity')";
if (mysqli_query($conn, $sql)) {
    echo "\n\nAdded Successfully!";
} else {
    echo "Error Occured!";
}

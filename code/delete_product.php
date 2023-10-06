<?php
include("connection.php");
$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id=$id";
if (mysqli_query($conn, $sql)) {
    header("Location: dashboard.php");
} else {
    echo "
        <p class='text-danger text-center mt-5'>
            Operation Failed!
        </p>
    ";
}

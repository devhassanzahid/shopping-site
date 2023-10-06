<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

// if (isset($_SESSION['username']) && ($_SESSION['role'] == "Admin")) {
//     echo "Admin";
// } else if (isset($_SESSION['username']) && ($_SESSION['role'] == "Admin")) {
//     echo "Admin";
// } else {
// }

// if(isset($_SESSION['username']))
// {
//     if ($_SESSION['role']=="Admin")
//     {
//         echo "Admin";
//     }
//     else
//     {
//         echo "Customer";
//     }
// }

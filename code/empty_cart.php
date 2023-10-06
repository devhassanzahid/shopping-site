<?php
session_start();
// extract($_GET);
$_SESSION['message'] = "<div class='d-flex justify-content-center mt-4'>
                            <p class='text-center alert alert-danger w-25 mt-1'>
                               <em>
                                Cart cleared successfully!
                               </em>
                            </p>
                        </div>";
unset($_SESSION['cart']);
header("location:cart.php");

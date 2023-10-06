<style>
</style>
<?php
include("connection.php");
include("header.php");
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
if ((!empty($username)) && (!empty($password)) && (!empty($role))) {
    $sql = "INSERT INTO user_logins VALUES ('','$username','$password','$role')";
    if (mysqli_query($conn, $sql)) {
        echo "
            <title>User Created!</title>
            <div class='mt-5 mb-3 text-center'>
                <img src='./images/success.jpg' />
                <p class='mt-4 mb-5 text-center h2 text-success '>
                    <em>User Registered Successfully!</em>
                </p>
            </div>
            <div class='mt-5 mb-3 text-center'>
                Want to Register another user?&nbsp;&nbsp; <a href='register.php'><button class='btn btn-primary'>Register User</button></a>
            </div>
            <div class='mt-3 mb-3 text-center'>
                Want to Login to Dashboard?&nbsp;&nbsp; <a href='login.php'><button class='btn btn-success'>Login</button></a>
            </div>
        ";
    }
} else if ((empty($username)) || (empty($password))) {
    echo " 
        <title>Error Occurred</title>
        <div class='text-center mt-3 mb-3'>
            <img src='./images/oops1.jpg' class='w-25'/>
            <p class='h2 text-danger mt-3 text-center'>
                There is something wrong with data entered by user!
            </p>
        </div>
    ";
} else {
    echo " 
        <title>Error Occurred</title>
        <div class='text-center mt-3 mb-3'>
            <img src='./images/oops1.jpg' class='w-25'/>
            <p class='h2 text-danger mt-3 text-center'>
                There is something wrong with data entered by user!
            </p>
        </div>
    ";
}

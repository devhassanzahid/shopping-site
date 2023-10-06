<?php
include("header.php");
include("connection.php");
$sql = "SELECT * FROM user_logins";
$users = mysqli_query($conn, $sql) or die("Failed");
if (mysqli_num_rows($users) > 0) {
    echo "user(s) found<br/>";
} else {
    echo "No user(s) found!";
}
?>
<title>Delete User</title>
<h1 class="text-center text-danger mt-5 mb-5">Delete User</h1>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3 text-center">
            <form action="delete_user.php">
                <div class="form-control">
                    <div class="mt-5 mb-4 text-center">
                        <img src="user3.png" class="w-25">
                    </div>
                    <input type="hidden" name="id">
                    <div class="text-center mt-3 mb-3 form-floating">
                        <input type="text" name="username" id="username" class="form-control input-sm" placeholder="Enter the username you want to delete...">
                        <label>Username</label>
                    </div>
                    <div class="text-center mt-3 mb-3 form-floating">
                        <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Enter the password of username you want to delete...">
                        <label>Password</label>
                    </div>
                    <div class="text-center mt-3 mb-3">
                        <button class="btn btn-danger">Delete User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
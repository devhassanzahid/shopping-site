<?php include("header.php"); ?>
<title>Register User</title>
<style>
    a {
        text-decoration: none;
        color: white;
    }

    a:hover {
        text-decoration: none;
        color: white;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="mt-5 mb-5">
                <h1 class="text-center text-primary">Register User</h1>
            </div>
            <form action="add_user.php" method="post">
                <div class="form-control">
                    <div class="mt-5 mb-4 text-center">
                        <!-- <img src="/images/user1.png" class="w-25"> -->
                        <img src="./images/user1.png" class="w-25">
                    </div>
                    <div class="form-floating mt-4 mb-3 text-center ">
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter username you want to register..." required>
                        <label for="username">Enter username you want to register</label>
                    </div>
                    <div class="form-floating mt-3 mb-3 text-center ">
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter password to be used with username..." required>
                        <label for="password">Enter password to be used with username...</label>
                    </div>
                    <div class="mt-3 mb-3 text-center ">
                        <select class="form-select" aria-label="Default select example" name="role" required>
                            <option selected>Select Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Customer">Customer</option>
                        </select>
                    </div>
                    <div class="mt-4 mb-2 text-center">
                        <button class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
            <div class="mt-4 mb-2 text-end">
                <em> Already Registered? &nbsp;<a href="login.php"><button class="btn btn-secondary"><em>Login</em></button></a></em>
            </div>
        </div>
    </div>
</div>
<?php include("header.php"); ?>
<style>
    a {
        color: white;
        text-decoration: none;
    }

    a:hover {
        color: white;
        text-decoration: none;
    }
</style>
<title>Main Site</title>
<link rel="icon" type="image/x-icon" href="site_logo.ico">

<body class="bg-dark text-white">
    <div class="container">
        <p class="h1 text-center text-warning mt-5 mb-5">Main Site</p>
        <div class="row text-center">
            <div class="col">
                <a class="btn btn-success" href="login.php">Login</a>
            </div>
            <div class="col">
                <a class="btn btn-primary" href="register.php">Register User</a>
            </div>
            <div class="col">
                <a class="btn btn-danger" href="delete.php">Delete User</a>
            </div>
        </div>
    </div>
</body>
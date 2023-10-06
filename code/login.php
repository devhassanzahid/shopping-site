<?php
session_start();
include("connection.php");
include("header.php");
// echo uniqid() . time();
// if (isset($_SESSION['username'])) header("location:dashboard.php");

if (isset($_SESSION['username'])) {
    if ($_SESSION['role'] == "Admin") {
        header("location: admin_dashboard.php");
    } else if ($_SESSION['role'] == "Customer") {
        header("location: customer_dashboard.php");
    } else {
        header("location:login.php");
    }
}

// header("location:dashboard.php");

?>
<title>Login</title>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6 offset-md-3 mt-5">
            <div class="card">
                <div class="card-header bg-dark text-center">
                    <img src="./images/user.jpg" class="rounded w-25 mt-5" />
                    <h1 class="text-center text-white">Login Page</h1>
                </div>
                <div class="card-body">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?> " method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" value="<?php if (isset($_COOKIE[""])) ?>" id="username" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group mt-3 mb-3">
                            <select class="form-select mt-4 mb-3" aria-label="Default select example" name="role">
                                <option selected>Select Role</option>
                                <option value="Customer">Customer</option>
                                <option value="Admin">Admin</option>
                            </select>
                        </div>
                        <div class="text-center mt-4">
                            <input type="submit" class="btn btn-success" name="submit" value="Login">
                        </div>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $name = mysqli_real_escape_string($conn, $_POST['username']);
                        $password = mysqli_real_escape_string($conn, $_POST['password']);
                        $role = $_POST['role'];
                        $sql = "SELECT * FROM user_logins WHERE username='$name' AND password ='$password' AND role='$role'  ";
                        $result = mysqli_query($conn, $sql) or die("Failed!");
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $_SESSION['username'] = $row['username'];
                            $_SESSION['password'] = $row['password'];
                            $_SESSION['role'] = $row['role'];
                            $_SESSION['id'] = $row['id'];
                            if ($_SESSION['role'] == "Customer") {
                                header("location: customer_dashboard.php");
                            } else {
                                header("location: admin_dashboard.php");
                            }

                            // header("location: dashboard.php");
                        } else {
                            echo "<p class='mt-2 text-center text-danger fst-italic'>Invalid Username or Password!</p>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include("footer.php");
?>
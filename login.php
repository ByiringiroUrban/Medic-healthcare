<?php
require_once 'includes/db_connect.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) { $errors[] = "Email is required."; }
    if (empty($password)) { $errors[] = "Password is required."; }

    if (empty($errors)) {
        $sql = "SELECT id, fullname, email, password, role FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $fullname, $db_email, $hashed_password, $role);
                    if (mysqli_stmt_fetch($stmt)) {
                        if (password_verify($password, $hashed_password)) {
                            // Password is correct, so start a new session
                            $_SESSION["loggedin"] = true;
                            $_SESSION["user_id"] = $id;
                            $_SESSION["fullname"] = $fullname;
                            $_SESSION["role"] = $role;

                            // Redirect user based on role
                            if ($role == 'admin') {
                                header("location: admin_dashboard.php");
                            } else {
                                header("location: dashboard.php");
                            }
                            exit;
                        } else {
                            $errors[] = "The password you entered was not valid.";
                        }
                    }
                } else {
                    $errors[] = "No account found with that email.";
                }
            } else {
                $errors[] = "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
}

$pageTitle = "Login";
require_once 'includes/header.php';
?>

<section class="page-header">
    <div class="container">
        <h1>Account Login</h1>
        <p>Access your dashboard to manage your appointments.</p>
    </div>
</section>

<section class="auth-section section-padding">
    <div class="container">
        <div class="auth-form-wrapper">
            <h3>Login to Your Account</h3>
            
             <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p class="auth-switch">Don't have an account? <a href="register.php">Register here</a></p>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>

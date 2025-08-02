<?php
require_once 'includes/db_connect.php';

$errors = [];
$success_message = '';

// Process the form when it's submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // --- Validation ---
    if (empty($fullname)) { $errors[] = "Full name is required."; }
    if (empty($email)) { $errors[] = "Email is required."; }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Invalid email format."; }
    if (empty($password)) { $errors[] = "Password is required."; }
    if (strlen($password) < 6) { $errors[] = "Password must be at least 6 characters long."; }
    if ($password !== $confirm_password) { $errors[] = "Passwords do not match."; }

    // --- Check if email already exists ---
    if (empty($errors)) {
        $sql = "SELECT id FROM users WHERE email = ?";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            if (mysqli_stmt_num_rows($stmt) > 0) {
                $errors[] = "This email is already registered.";
            }
            mysqli_stmt_close($stmt);
        }
    }

    // --- If no errors, insert into database ---
    if (empty($errors)) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)";
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "sss", $fullname, $email, $hashed_password);
            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Registration successful! You can now <a href='login.php'>login</a>.";
            } else {
                $errors[] = "Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
}

$pageTitle = "Register";
require_once 'includes/header.php';
?>

<section class="page-header">
    <div class="container">
        <h1>Create an Account</h1>
        <p>Register to start booking and managing your appointments online.</p>
    </div>
</section>

<section class="auth-section section-padding">
    <div class="container">
        <div class="auth-form-wrapper">
            <h3>Register for a New Account</h3>

            <!-- Display errors -->
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <?php foreach ($errors as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <!-- Display success message -->
            <?php if ($success_message): ?>
                <div class="alert alert-success">
                    <p><?php echo $success_message; ?></p>
                </div>
            <?php else: ?>
                <form action="register.php" method="POST">
                    <div class="form-group">
                        <label for="fullname">Full Name</label>
                        <input type="text" id="fullname" name="fullname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                </form>
            <?php endif; ?>

            <p class="auth-switch">Already have an account? <a href="login.php">Login here</a></p>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>

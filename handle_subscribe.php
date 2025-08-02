<?php
require_once 'includes/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if email already exists
        $sql_check = "SELECT id FROM subscribers WHERE email = ?";
        if ($stmt_check = mysqli_prepare($conn, $sql_check)) {
            mysqli_stmt_bind_param($stmt_check, "s", $email);
            mysqli_stmt_execute($stmt_check);
            mysqli_stmt_store_result($stmt_check);
            
            if (mysqli_stmt_num_rows($stmt_check) == 0) {
                // Email doesn't exist, insert it
                $sql_insert = "INSERT INTO subscribers (email) VALUES (?)";
                if ($stmt_insert = mysqli_prepare($conn, $sql_insert)) {
                    mysqli_stmt_bind_param($stmt_insert, "s", $email);
                    mysqli_stmt_execute($stmt_insert);
                    mysqli_stmt_close($stmt_insert);
                }
            }
            mysqli_stmt_close($stmt_check);
        }
    }
}

// Redirect back to the previous page
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>

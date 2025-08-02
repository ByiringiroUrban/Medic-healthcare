<?php
require_once 'includes/db_connect.php';

$errors = [];
$success_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve form data
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $service = trim($_POST['service']);
    $date = trim($_POST['date']);
    $time = trim($_POST['time']);
    $message = trim($_POST['message']);
    
    // Get user_id if logged in, otherwise it's NULL
    $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    // --- Validation ---
    if (empty($name)) { $errors[] = "Name is required."; }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "A valid email is required."; }
    if (empty($phone)) { $errors[] = "Phone number is required."; }
    if (empty($service)) { $errors[] = "Please select a service."; }
    if (empty($date)) { $errors[] = "Please select a date."; }
    if (empty($time)) { $errors[] = "Please select a time."; }

    // --- If no errors, insert into database ---
    if (empty($errors)) {
        $sql = "INSERT INTO appointments (user_id, patient_name, patient_email, patient_phone, service, appointment_date, appointment_time, message) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "isssssss", $user_id, $name, $email, $phone, $service, $date, $time, $message);
            
            if (mysqli_stmt_execute($stmt)) {
                $success_message = "Your appointment has been booked successfully! We will contact you shortly to confirm.";
            } else {
                $errors[] = "Something went wrong. Please try again later. Error: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        }
    }
}

// We will display the result on the appointment page itself.
// So we store messages in the session and redirect back.
$_SESSION['form_errors'] = $errors;
$_SESSION['form_success'] = $success_message;

header("location: appointment.php");
exit();
?>

<?php
require_once 'includes/db_connect.php';

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$pageTitle = "My Dashboard";
require_once 'includes/header.php';

// Fetch appointments for the logged-in user
$user_id = $_SESSION["user_id"];
$appointments = [];
$sql = "SELECT service, appointment_date, appointment_time, status FROM appointments WHERE user_id = ? ORDER BY appointment_date DESC, appointment_time DESC";

if($stmt = mysqli_prepare($conn, $sql)){
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    while($row = mysqli_fetch_assoc($result)){
        $appointments[] = $row;
    }
    mysqli_stmt_close($stmt);
}
?>

<section class="page-header">
    <div class="container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION["fullname"]); ?>!</h1>
        <p>Here you can view your upcoming and past appointments.</p>
    </div>
</section>

<section class="dashboard-section section-padding">
    <div class="container">
        <h2>My Appointments</h2>
        <div class="table-responsive">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($appointments)): ?>
                        <tr>
                            <td colspan="4">You have no appointments. <a href="appointment.php">Book one now!</a></td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($appointment['service']); ?></td>
                                <td><?php echo date("F j, Y", strtotime($appointment['appointment_date'])); ?></td>
                                <td><?php echo date("g:i A", strtotime($appointment['appointment_time'])); ?></td>
                                <td><span class="status-<?php echo strtolower(htmlspecialchars($appointment['status'])); ?>"><?php echo htmlspecialchars($appointment['status']); ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>

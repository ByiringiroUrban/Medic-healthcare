<?php
require_once 'includes/db_connect.php';

// Check if the user is logged in and is an admin
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role"] !== 'admin') {
    header("location: login.php");
    exit;
}

$pageTitle = "Admin Dashboard";
require_once 'includes/header.php';

// Fetch all appointments
$appointments = [];
$sql = "SELECT id, patient_name, service, appointment_date, appointment_time, status FROM appointments ORDER BY appointment_date DESC, appointment_time DESC";

$result = mysqli_query($conn, $sql);
if($result){
    while($row = mysqli_fetch_assoc($result)){
        $appointments[] = $row;
    }
}
?>

<section class="page-header">
    <div class="container">
        <h1>Admin Dashboard</h1>
        <p>Manage all patient appointments from this panel.</p>
    </div>
</section>

<section class="dashboard-section section-padding">
    <div class="container">
        <h2>All Appointments</h2>
        <div class="table-responsive">
            <table class="dashboard-table">
                <thead>
                    <tr>
                        <th>Patient Name</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($appointments)): ?>
                        <tr>
                            <td colspan="6">No appointments found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($appointments as $appointment): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($appointment['patient_name']); ?></td>
                                <td><?php echo htmlspecialchars($appointment['service']); ?></td>
                                <td><?php echo date("F j, Y", strtotime($appointment['appointment_date'])); ?></td>
                                <td><?php echo date("g:i A", strtotime($appointment['appointment_time'])); ?></td>
                                <td><span class="status-<?php echo strtolower(htmlspecialchars($appointment['status'])); ?>"><?php echo htmlspecialchars($appointment['status']); ?></span></td>
                                <td>
                                    <!-- In a full app, these links would go to pages to update status -->
                                    <a href="#" class="action-btn">Confirm</a>
                                    <a href="#" class="action-btn-cancel">Cancel</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>

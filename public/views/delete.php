<?php
require_once "../../app/classes/VehicleManager.php";

$vehicleManager = new VehicleManager('', '', '', '');
$id = $_GET['id'] ?? null;

if ($id === null) {
    header("Location: ../index.php");
    exit;
}

$vehicles = $vehicleManager->getVehicles();
$vehicle = $vehicles[$id] ?? null;

if (!$vehicle) {
    header("Location: ../index.php");
    exit;
}

// If form is submitted via POST to confirm deletion
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        // Delete the vehicle
        $vehicleManager->deleteVehicle($id);
    }
    // Redirect after deletion or cancellation
    header("Location: ../index.php");
    exit;
}
?>

<?php include './header.php';// Include header?>

<div class="container my-4">
    <h1>Delete Vehicle</h1>
    <p>Are you sure you want to delete the vehicle <strong><?= htmlspecialchars($vehicle['name']) //will see the name while deleting?></strong>?</p>
    <!-- Confirm deletion -->
    <form method="POST">
        <button type="submit" name="confirm" value="yes" class="btn btn-danger">Yes, Delete</button>
        <a href="../index.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

</body>
</html>

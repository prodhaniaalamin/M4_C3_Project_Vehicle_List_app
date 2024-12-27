<?php

interface VehicleActions {
    public function addVehicle($data);    // Add a new vehicle
    public function editVehicle($id, $data); // Edit an existing vehicle
    public function deleteVehicle($id);  // Delete a vehicle by ID
    public function getVehicles();       // Retrieve all vehicles
}

?>

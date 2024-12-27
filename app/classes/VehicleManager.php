<?php

require_once 'VehicleBase.php';
require_once 'VehicleActions.php';
require_once 'FileHandler.php';

class VehicleManager extends VehicleBase implements VehicleActions {
    use FileHandler; // Use the FileHandler trait for file operations

    public function addVehicle($data) {
        $vehicles = $this->readFromFile(); // Get existing data
        $vehicles[] = $data;              // Add new vehicle data
        $this->writeFile($vehicles);      // Save back to file
    }

    public function editVehicle($id, $data) {
        $vehicles = $this->readFromFile(); // Get existing data
        if (isset($vehicles[$id])) {      // Check if the vehicle exists
            $vehicles[$id] = $data;       // Update the specific vehicle
            $this->writeFile($vehicles);  // Save back to file
        }
    }

    public function deleteVehicle($id) {
        $vehicles = $this->readFromFile(); // Get existing data
        if (isset($vehicles[$id])) {      // Check if the vehicle exists
            unset($vehicles[$id]);        // Remove the vehicle
            $this->writeFile(array_values($vehicles)); // Reindex and save
        }
    }

    public function getVehicles() {
        return $this->readFromFile(); // Return all vehicles
    }

    // Implement the abstract method
    public function getDetails() {
        return [
            'name' => $this->name,
            'type' => $this->type,
            'price' => $this->price,
            'image' => $this->image
        ];
    }
}

?>

<?php


trait FileHandler {
    private $filePath = __DIR__ . "/../../data/vehicles.json";// Relative path to the data file

    // Reads data from the JSON file
    public function readFromFile() {
        // Create the file with empty data if it doesn't exist
        if(!file_exists($this->filePath)){
            file_put_contents($this->filePath, json_encode([]));
        }
        // Return data as an associative array
        return json_decode(file_get_contents($this->filePath), true);
    }

      // Writes data to the JSON file
    public function writeFile($data) {
        file_put_contents($this->filePath, json_encode($data, JSON_PRETTY_PRINT));
    }
}


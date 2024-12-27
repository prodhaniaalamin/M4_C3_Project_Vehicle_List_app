<?php

abstract class VehicleBase {
    protected $name;  // Name of the vehicle
    protected $type;  // Type of the vehicle (e.g., car, bike)
    protected $price; // Price of the vehicle
    protected $image; // Image URL

    public function __construct($name, $type, $price, $image) {
        $this->name = $name;
        $this->type = $type;
        $this->price = $price;
        $this->image = $image;
    }

    // Force child classes to implement a details method
    abstract public function getDetails();
}

?>

<?php

// memanggil file Car.php
require "Car.php";

class ElectricCar extends Car
{
    // property khusus milik ElectricCar
    public $batteryCapacity;

    public function __construct($brand, $model, $color, $batteryCapacity)
    {
        parent::__construct($brand, $model, $color);
        $this->batteryCapacity = $batteryCapacity;
    }
}
?>
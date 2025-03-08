<?php

// require "Classes/Car.php";
require "Classes/ElectricCar.php";

// object baru dari Car
$avanza = new Car('Toyota', 'Avanza', 'White');
// object baru dari ElectricCar
$tesla = new ElectricCar('Tesla', 'Model 3', 'Silver', 75);

// mencetak object ke browser
echo $avanza->showData();
echo "<br>";
echo $tesla->showData();
?>
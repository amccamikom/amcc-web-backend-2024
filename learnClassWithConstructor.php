<?php

class People
{
    var $name;
    var $age;
    var $address;

    // membuat construtor
    function __construct($name, $age, $address)
    {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    function sayHello()
    {
        return "Hello Amikom!";
    }
}

$salman = new People("Salman", 20, "Jogja");
echo $salman->name;
echo "<br>";
echo $salman->age;
echo "<br>";
echo $salman->address;
echo "<br>";
?>
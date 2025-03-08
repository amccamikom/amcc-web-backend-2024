<?php

// membuat class baru
class People
{
    // membuat property
    var $name;
    var $age;
    var $address;

    // membuat method
    function sayHello()
    {
        return "Hello Amikom!";
    }
}

// membuat object baru
$people1 = new People();

$people1->name = "Salman";
$people1->age = 20;
$people1->address = "Jogja";

// cara mengakses property
echo $people1->name;
echo "<br>";
echo $people1->age;
echo "<br>";
echo $people1->address;
echo "<br>";
// cara mengakses method
echo $people1->sayHello();
?>
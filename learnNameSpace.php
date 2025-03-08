<?php

// menggunakan namespace
namespace ASUS;
class Laptop
{
    function index()
    {
        return "ASUS";
    }
}

namespace Lenovo;
class Laptop
{
    function index()
    {
        return "Lenovo";
    }
}

// menggunakan use keyword
use \ASUS\Laptop as ASUS;
use \Lenovo\Laptop as Lenovo;

// membuat object
$asus = new ASUS;
$lenovo = new Lenovo;

// mencetak method dari object
echo $asus->index();
echo "<br>";
echo $lenovo->index();
?>
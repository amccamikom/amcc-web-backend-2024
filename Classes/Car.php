<?php

// Membuat class Car
class Car
{
    // Membuat property brand, model dan color
    public $brand;
    public $model;
    public $color;

    // Membuat method construct
    public function __construct($brand, $model, $color)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
    }

    // Membuat function showData untuk mempermudah menampilkan data
    public function showData()
    {
        echo "Brand : " . $this->brand . "<br>";
        echo "Model : " . $this->model . "<br>";
        echo "Color : " . $this->color . "<br>";
    }
}
?>
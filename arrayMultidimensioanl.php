<?php
// Array Multidimensional + Array Associative
$book = [
    ["name" => "PHP for Beginners", "price" => "120", "author" => "John Doe"],
    ["name" => "Web Design 101", "price" => "90", "author" => "Jane Smith"],
    ["name" => "JavaScript Mastery", "price" => "150", "author" => "Sam Jones"]
];

echo $book[0]["name"] . " ditulis oleh " . $book[0]["author"] . ", harganya $" . $book[0]["price"] . ".<br>";

// Array Multidimensional + Array Index
$buku = [
    ["PHP for Beginners", 120, "John Doe"],
    ["Web Design 101", 90, "Jane Smith"],
    ["JavaScript Mastery", 150, "Sam Jones"]
];

echo $buku[0][0] . " ditulis oleh " . $buku[0][2] . ", harganya $" . $buku[0][1] . ".";
?>
<?php
    $number1 = 15;
    $number2 = 10;

    $greaterThan = $number1 > $number2 ? "Ya" : "Tidak";
    $lessThan = $number1 < $number2 ? "Ya" : "Tidak";
    $sequal = $number1 == $number2 ? "Ya" : "Tidak";

    echo "Apakah $number1 lebih besar dari $number2? " . $greaterThan . "<br>";
    echo "Apakah $number1 lebih kecil dari $number2? " . $lessThan . "<br>";
    echo "Apakah $number1 sama dengan $number2? " . $sequal . "<br>";
?>
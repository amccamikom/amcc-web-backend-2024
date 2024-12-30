<?php
    // Version 1
    $fruits = array("Apple", "Banana", "Orange");
    echo "I like " . $fruits[0] . ", " . $fruits[1] . " and " . $fruits[2] . ".";

    echo "<br><br>";
    
    // Version 2
    $days = ["Monday", "Tuesday", "Wednesday"];
    echo "Im working on " . $days[0] . ", " . $days[1] . " and " . $days[2] . ".";

    echo "<br><br>";

    // Add data to array
    $days[] = "Thursday";

    // Erase data from array
    unset($days[2]);

    // Print array
    print_r($days);
    echo "<br><br>";
    var_dump($days);
?>
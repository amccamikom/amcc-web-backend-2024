<?php

  echo "for loop <br/>";
  for ($i= 1; $i <= 5; $i++) {         
    echo "Pertemuan ke-" . $i . "<br/>";
  }

  echo "<br/> foreach loop <br/>";
  $names = ["Kak Ros", "Opah", "Tok Dalang", "Angken Muhtu", "Sepi"];
  foreach ($names as $key => $name) {
    echo "Nama index ke-" . $key . " " . $name . ", ";
  }

  echo "<br/>";
  $fruits = [
    "manis" => ["mangga", "salak"],
    "asam" => ["jeruk", "sirsat"]
  ];
  foreach ($fruits as $key => $fruit) {
    var_dump($fruit);
  }

  echo "<br/><br/>";
  // while
  $isNotElligble = true;
  $score = 75;
  while ($isNotElligble) {    
    if ($score >= 81) {
      echo "Kamu lulus <br/>";
      $isNotElligble = false;
    } else {
      echo "Kamu gagal <br/>";
    }
    $score++;    
  }

?>
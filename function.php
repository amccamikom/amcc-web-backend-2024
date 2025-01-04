<?php

  echo "Halo kak Ros";
  echo "Halo ipin";
  echo "Halo Jarjit";
  echo "<br/>";

  function say($name){
    echo "Halo " . $name;
  }

  function say2($name) {
    return "Haloo " . $name;
  }

  
  say("kak Ros");
  say("ipin");
  say("Jarjit");
  
  echo "<br/>";
  
  $sayHello = say2("Ehsan");
  echo $sayHello;

  echo "<br/>";


  // Built in function
  $names = ["Kak Ros", "Opah", "Tok Dalang", "Angken Muhtu", "Sepi"];
  var_dump($names);
  array_push($names, "Rajuu");
  var_dump($names);
  
  echo "<br/>";
  var_dump(isset($names));
?>
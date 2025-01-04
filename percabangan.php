<?php

  // Percabangan
  // Operator perbandingan: < > <= >= == !=
  // Operator logika: && dan ||
  $age = 18;
  if ($age >= 18) {
    echo "Anda boleh mendaftar akun amcc <br/>";
  }

  echo "<br/>";

  echo "if else <br/>";
  
  $score = 90;
  if ($score >= 81) {
    echo "Kamu lulus <br/>";
  } else {
    echo "Kamu gagal <br/>";
  }

  echo "if elseif <br/>";
  $age = 30;
  if ($age <= 5) {
    echo "Masih balita <br/>";
  } else if ($age <= 12) {
    echo "Masih anak-anak <br/>";
  } else if ($age <= 18) {
    echo "Masih remaja <br/>";
  } else {
    echo "Sudah tua <br/>";
  }

  // aku pengen buat kondisi 
  // jika umur nya itu antara 5 dan 12 tahun 
  // maka outputnya adalah "Anak-anak";
  // clue operator logika = &&

  // $age = 2;
  // if ($age >= 5 && $age <= 12) {
  //   echo "anak-anak";
  // } else {
  //   echo "tidak anak-anak";
  // }

  // Switch
  echo "<br/> Switch Case <br/>";
  $price = 10000;
  switch ($price) {
    case 6000:
      echo "Saya dapet lee mineral <br/>";
      break;
    case 10000:
      echo "Saya dapet nasi telur <br/>";
      break;
    default:
      echo "Menu tidak tersedia";
      break;
  }


  echo "<br/> Ternary <br/>";
  $value = 80;
  $status = "";
  if ($value >= 81) {    
    $status = "lulus";
  } else {
    $status = "tidak lulus";
  }
  echo $status . "<br/>";

  $status = $value >= 81 ? "lulus" : "tidak lulus";
  echo $status;  
?>
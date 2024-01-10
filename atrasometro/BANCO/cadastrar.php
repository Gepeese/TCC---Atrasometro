<?php
$servername = "localhost";
$database = "atrasometrox";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}
$arquivo = "turma353.txt";
$fp = fopen($arquivo,"r+");


while (($line = fgets($fp)) !== false) {
   $tamanho = strlen($line)-12;
   $palavra = trim(substr($line,0,$tamanho));
   $matricula = trim(substr($line,$tamanho));
   echo $palavra." - ".$matricula."<br>";
   $sql = "INSERT INTO alunos (matricula,nomealuno,cursoaluno) VALUES ('$matricula','$palavra',8)";
  if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
mysqli_close($conn);
<?php
$host = "localhost"; 
$user = "root"; 
$dbname = "testdb"; 
$id = '';


$con = mysqli_connect($host, $user, $password,$dbname);
$method = $_SERVER['REQUEST_METHOD'];
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

switch ($method) {
    case 'GET':
      $sql = "select * from fillers ORDER BY id DESC LIMIT 10"; 
      break;
    case 'POST':
      $name = $_POST["name"];
      $litres = $_POST["litres"];
      $sql = "insert into fillers (name, litres) values ('$name','$litres')"; 
      break;
}

$result = mysqli_query($con,$sql);
if ($method == 'GET') {
    if (!$id) echo '[';
    for ($i=0 ; $i<mysqli_num_rows($result) ; $i++) {
      echo ($i>0?',':'').json_encode(mysqli_fetch_object($result));
    }
    if (!$id) echo ']';
  } elseif ($method == 'POST') {
    echo json_encode($result);
  } else {
    echo mysqli_affected_rows($con);
  }

$con->close();
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
      $sql = "select * from tanks"; 
      break;
    case 'POST':
      $litres1 = $_POST["litres_added1"];
      $litres2 = $_POST["litres_added2"];
      $litres3 = $_POST["litres_added3"];
      $litres4 = $_POST["litres_added4"];
      $litres5 = $_POST["litres_added5"];
      $sql = "INSERT INTO tanks (id,litres)
      VALUES (1, '$litres1'),
      (2, '$litres2'),
      (3, '$litres3'),
      (4, '$litres4'),
      (5, '$litres5')
      ON DUPLICATE KEY UPDATE id=VALUES(id),
      litres=VALUES(litres);"; 
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
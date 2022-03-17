
<?php
  include 'conecter.php';
  $sql="SELECT * FROM students";
  $count=$conne->query($sql);
  $num_std=mysqli_num_rows($count);

//  payments

  $somme="SELECT SUM(amount_paid) as somme FROM payment_details";
  $query=mysqli_query($conne,$somme);
  $array=mysqli_fetch_array($query);


  if(!$result = $conne->query($somme))
  {
    die("Connection failed: " . $conne->error);
  }
  else
  {
    $somme = $result->fetch_assoc();
  }

//   courses

$sql="SELECT * FROM courses";
$count=$conne->query($sql);
$num_cour=mysqli_num_rows($count);
?>
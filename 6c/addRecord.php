<?php
 if(isset($_POST['name']) && isset($_POST['work']) && isset($_POST['salary']))
 {
  // include Database connection file 
  include("conn.php");

  // get values 
  $name = $_POST['name'];
  $work = $_POST['work'];
  $salary = $_POST['salary'];

  $query = "INSERT INTO name(name, id_work, id_salary) VALUES('$name', '$work', '$salary')";
  if (!$result = mysqli_query($conn, $query)) {
         exit(mysqli_error($conn));
     }
     echo "1 Record Added!";
 }
?>
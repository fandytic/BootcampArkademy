<?php
// include Database connection file
include("conn.php");

// check request
if(isset($_POST['name']) && isset($_POST['work']) && isset($_POST['salary']) && isset($_POST['id']))
{
    // get values
    $id = $_POST['id'];
    $name = $_POST['name'];
    $work = $_POST['work'];
    $salary = $_POST['salary'];

    // Updaste User details
    $query = "UPDATE name SET name = '$name', id_work = '$work', id_salary = '$salary' WHERE id = '$id'";
    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
    }
}
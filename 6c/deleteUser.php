<?php
// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // include Database connection file
    include("conn.php");

    // get user id
    $id = $_POST['id'];

    // delete User
    $query = "DELETE FROM name WHERE id = '$id'";
    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
    }
}
?>
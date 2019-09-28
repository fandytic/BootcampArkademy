<?php
// include Database connection file
include("conn.php");

// check request
if(isset($_POST['id']) && isset($_POST['id']) != "")
{
    // get User ID
    $user_id = $_POST['id'];

    // Get User Details
    $query = "SELECT a.name, a.id as id_user, b.id as work, c.id as salary FROM name a, work b, salary c WHERE a.id_work = b.id AND a.id_salary = c.id AND a.id = '$user_id'";
    if (!$result = mysqli_query($conn, $query)) {
        exit(mysqli_error($conn));
    }
    $response = array();
    if(mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $response = $row;
        }
    }
    else
    {
        $response['status'] = 200;
        $response['message'] = "Data not found!";
    }
    // display JSON data
    echo json_encode($response);
}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}
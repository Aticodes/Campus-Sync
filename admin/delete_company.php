<?php
include 'db.php';

$id = $_GET['company_id'];
$query = "DELETE FROM `comapny_master` WHERE company_id = $id";
$run = mysqli_query($conn, $query);

if($run){
    // header('location:add_update_party.php');
    echo "<script>window.location.href='view_company.php';</script>";
}

else{
    echo "<script>alert('Something Went Wrong!!'); window.location.href='view_company.php';</script>";
}
?>
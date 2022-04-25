<?php 
include('../function/db.php');

include('bootstrap.php');
include('jquery.php'); 


$admission = mysqli_query($db, "SELECT * FROM users WHERE id = ".$_SESSION['id']); 
$row = mysqli_fetch_array($admission);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> ADMIN </title>
    <link rel="icon" href="../seal/coe-logo.png" sizes="32x32" type="image/png">

    
    <link rel="stylesheet" href="assets/css/main.css">
  
    <link rel="stylesheet" href="../dist/css/btn.admin.css">

</head>

<body>

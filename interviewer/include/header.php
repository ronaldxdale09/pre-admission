<?php 
include('../function/db.php');

include('bootstrap.php');
include('jquery.php'); 
include('modal/modal.php');


$evaluator = mysqli_query($db, "SELECT * from interviewer 
  LEFT JOIN college ON interviewer.college_id = college.college_id
  LEFT JOIN users ON interviewer.user_id = users.id
  where user_id ='".$_SESSION['id']."'"); 
$row = mysqli_fetch_array($evaluator);

if ($row["college_img"] == ''){
    $row["college_img"] = 'WMSU_SEAL.jpg';
 }

 $college = $row['college_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interviewer | <?php echo $row['college_name']?> </title>
    <link rel="icon" href="../seal/coe-logo.png" sizes="32x32" type="image/png">

    
    <link rel="stylesheet" href="assets/css/main.css">
  
    <link rel="stylesheet" href="../dist/css/btn.admin.css">

</head>

<body>

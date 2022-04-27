<?php 
include('../function/db.php');
include('bootstrap.php');
include('jquery.php');

$evaluator = mysqli_query($db, "SELECT * from evaluator 
  LEFT JOIN college ON evaluator.college_id = college.college_id
  LEFT JOIN users ON evaluator.user_id = users.id
  where user_id ='".$_SESSION['id']."'"); 
$row = mysqli_fetch_array($evaluator);

if ($row["college_img"] == ''){
    $row["college_img"] = 'WMSU_SEAL.jpg';
 }

 $college = $row['college_name'];
 $college_id = $row['college_id'];

 $record = mysqli_query($db, "SELECT * FROM admissionbatch WHERE is_active=1");
 $admission=mysqli_fetch_array($record);
 $academic_id =  $admission['admission_id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluator | <?php echo $row['college_name']?> </title>
    <link rel="icon" href="../seal/coe-logo.png" sizes="32x32" type="image/png">

    
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/statistic-card.css">
    <link rel="stylesheet" href="../dist/css/btn.admin.css">
    

</head>

<body>
    <?php  if (isset($_SESSION['email'])) : ?>
    <header class="page-header">
        <nav>
          <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
            <i class="fa fa-bars"></i>
          </button>
          <a href="../index.html">
            <img class="logo mx-auto" src="../collegeimg/<?php echo $row['college_img']?>" alt="ics logo">
          </a>
          <ul class="admin-menu">
            <li class="menu-heading">
              <h3>APPLICANTS LIST</h3>
            </li>
            <li>
                <a href="coe.evaluator.main.php" class="active">
                    <i class="fa fa-list" aria-hidden="true"><span>Applications</span></i>
                </a>
            </li>
            <li>
              <a href="coe.evaluator.pre.php">
                <i class="fa fa-list" aria-hidden="true"><span>Prequalified</span></i>
              </a>
            </li>
            <li>
              <a href="coe.evaluator.rej.php">
                <i class="fa fa-thumbs-o-down" aria-hidden="true"><span>Rejected</span></i>
              </a>
            </li>
            <li>
              <a href="coe.evaluator.cancel.php">
              <i class="fa fa-ban" aria-hidden="true"><span>Cancelled</span></i>
              </a>
            </li>
            <li>
              <a href="../index.php?logout='1'">
                <i class="fa fa-sign-out"><span>logout</span></i>
              </a>
            </li>
          </ul>
        </nav>
      </header>
      <?php endif ?>
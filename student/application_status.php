<?php 

include('include/header.php');
include('include/navbar.php');

if (isset($_GET['tracking_id'])) {
    $id = $_GET['tracking_id'];
  }
  

$selectedCourse = mysqli_query($db, "SELECT * from selectedcourse where selectedCourse_id  ='$id'");  
$row = mysqli_fetch_array($selectedCourse);

$courseinfo    =mysqli_query($db, "SELECT * from coursestbl where course_id  ='".$row['course_id']."'"); 
$course = mysqli_fetch_array($courseinfo);

$pending='';
$rejected='';
$prequalified='';
$interview='';
$waiting='';
$successful='';
if ($row['userStatus'] =='PENDING')
    $pending ='active';
elseif ($row['userStatus'] =='REJECTED'){
    $pending ='active';
}
elseif ($row['userStatus'] =='PREQUALIFIED'){
    $pending ='active';
    $prequalified='active';
}
elseif ($row['userStatus'] =='INTERVIEW') {
    $pending ='active';
    $prequalified='active';
    $interview='active';
}
 
elseif ($row['userStatus'] =='QUALIFIED') {
    $pending ='active';
    $prequalified='active';
    $interview='active';
    $successful='active';
}
elseif ($row['userStatus'] =='WAITING') {
    $pending ='active';
    $prequalified='active';
    $interview='active';
    $successful='active';
}

$logrecord = mysqli_query($db, "SELECT * from application_log where selectedCourse_id  ='$id'"); 
?>

<body>

    <link rel="stylesheet" href="assets/css/table.css">
    <link rel="stylesheet" href="assets/css/tracking.css">
    <br><br><br>
    <div class="container">
        <article class="card">
            <header class="card-header">
                <div class="container">
                    <div class="row">
                        <div class="col-10">
                            Tracking Status
                        </div>
                      
                        <div class="col-sm">
                            <a href="index.php"
                                class="btn btn-dark btn-sm"> Return</a>
                        </div>
                    </div>
                </div>
            </header>
            <div class="card-body">
                <h6>Pre-Admission ID : <?php echo $row['selectedCourse_id'] ?> </h6>
                <article class="card">
                    <div class="card-body row">
                        <div class="col">Selected Course: <br>
                            <div class="user-info">
                                <div class="user-info__img">
                                    <img src="../collegeimg/<?php echo $course["course_img"]?>" alt="User Img">
                                </div>
                                <div class="user-info__basic">
                                    <strong>
                                        <h5 class="mb-0"><?php echo $course["course_name"] ?></h5>
                                    </strong>

                                </div>
                            </div>
                        </div>

                        <div class="col"> <strong>Status:</strong> <br>
                            <button type="button"
                                class="btn btn-outline-secondary"><?php echo $row['userStatus'] ?></button>
                        </div>
                        <!-- <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div> -->
                    </div>
                </article>
                <div class="track">
                    <div class="step <?php echo $pending ?>"> <span class="icon"> <i class="fa fa-file"></i> </span>
                        <span class="text">Pending</span>
                    </div>
                    <div class="step <?php echo $prequalified ?>"> <span class="icon"><i class="fas fa-archive"></i>
                        </span> <span class="text">Pre-Qualified</span>
                    </div>
                    <div class="step <?php echo $interview ?>"> <span class="icon"> <i class="fa fa-user-alt"></i>
                        </span> <span class="text">
                            Interview </span> </div>
                    <div class="step <?php echo $successful ?>"> <span class="icon"> <i class="fa fa-check"></i> </span>
                        <span class="text">Congratulation</span>
                    </div>
                </div>
                <hr>
                <!-- table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>Course</th>
                            <th>Date</th>
                            <th>Status</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($log = mysqli_fetch_array($logrecord)) {  
                            $status='';

                            if ($log['userStatus'] =='PENDING')

                                $status ='primary';
                            elseif ($log['userStatus'] =='REJECTED'){
                                $status ='danger';
                            }
                            elseif ($log['userStatus'] =='PREQUALIFIED'){
                                $status ='warning';
                            }
                            elseif ($log['userStatus'] =='INTERVIEW') {
                                $status ='info';
                            }
                             
                            elseif ($log['userStatus'] =='QUALIFIED') {
                                $status ='success';
                            }
                            elseif ($log['userStatus'] =='WAITING') {
                                $status ='success';
                            }
                     ?>
                        <tr>
                            <td>
                                <div class="user-info">
                                    <div class="user-info__img">
                                        <img src="../collegeimg/<?php echo $course["course_img"]?>" alt="User Img">
                                    </div>
                                    <div class="user-info__basic">
                                        <h6 class="mb-0"><?php echo $course["course_name"] ?></h6>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <?php echo $log['date'] ?>
                            </td>

                            <td>
                            <button type="button"
                                class="btn btn-<?php echo $status ?> btn-sm"><?php echo $log['userStatus'] ?></button> 
                            <td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>

                <!-- table end -->
            </div>
        </article>
    </div>
</body>

</html>
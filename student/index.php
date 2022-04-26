<?php 
   include('include/header.php');
   include('include/navbar.php');


   $getCET = mysqli_query($db, "SELECT * from cetresult where applicantid  ='".$_SESSION['applicantID']."'"); 
   $arr = mysqli_fetch_array($getCET);

   $listSelectedCourse = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where user_id  ='".$_SESSION['id']."'"); 
   $countCourse = mysqli_fetch_array($listSelectedCourse);
   ?>

<body>
    <div class="container">
        <div class="main-body">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="main-breadcrumb">
                <ol class="breadcrumb">
                    <h6 style='margin-bottom:0px;'>
                         Admission Schedule: <?php
                            $record = mysqli_query($db, "SELECT * FROM admissionbatch WHERE is_active=1");
                            $admission=mysqli_fetch_array($record);
                            if(isset($admission)){
                                echo date('M d',strtotime($admission['start_date']))." to ".date('M d',strtotime($admission['end_date'])).", S.Y. ".$admission['schoolyear'];
                            }
                        ?>
                    </h6>
                </ol>
            </nav>
            <!-- /Breadcrumb -->
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                    class="rounded-circle" width="150">
                                <div class="mt-3">
                                    <h4> <?php echo $fullname = $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></h4>
                                    <p class="text-secondary mb-1">Regular</p>
                                    <button class="btn btn-primary">Upload</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">CET Application ID </h6>
                                <span class="text-secondary"><?php echo $arr['applicantid']?></span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                <h6 class="mb-0">

                                    CET
                                </h6>
                                <span class="text-secondary"><?php echo $arr['cetresult'] ?></span>
                            </li>
                        </ul>
                    </div>
                </div>
                <?php
                    $record = mysqli_query($db, "SELECT * FROM users WHERE id=".$_SESSION['id']);
                    $user=mysqli_fetch_array($record);
                ?>
                <div class="col-md-8">
                    <div class="card mb-3">
                        
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-sm-3">
                                    
                                    <h6 class="mb-0">Full Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $fullname = $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $_SESSION['email'];?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Phone</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user['contactNo']; ?>
                                </div>
                            </div>
                            <hr>


                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Address</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?php echo $user['address']; ?>
                                </div>
                            </div>
                            <hr>

                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-9 text-secondary">
                                    Please choose your desired course ! <a
                                        href="apply.php"
                                        class="btn btn-danger btn-sm"> Apply</a>
                                    <hr>
                                    <h5>Selected Course <?php echo $countCourse[0] ?>/3 </h5>

                                </div>


                                <?php include('selectedcourse.php') ?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <?php include('include/footer.php');?>
            <?php include('modal/modal.php');?>
</body>

</html>
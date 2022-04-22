<?php
include ('../../function/db.php');

if (isset($_POST['submit'])) {
    echo $id = $_POST['id'];
    echo $interview = $_POST['sched_time'];
    $action = 'INTERVIEW';

    $query = "UPDATE selectedcourse SET userStatus='$action', interview_sched='$interview',date=NOW() WHERE selectedCourse_id='$id'";
    $results = mysqli_query($db, $query);
        if ($results) {
        //echo $sender;
            $_SESSION['schedule'] = "Address updated!";
            
            header('location: ../index.php');
        } else {
            echo "ERROR: Could not be able to execute $query. ".mysqli_error($db);
        }
}

?> 
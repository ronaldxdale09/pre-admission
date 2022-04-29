<?php
include ('../../function/db.php');
require "PHPMailer/PHPMailerAutoload.php";


if (isset($_POST['submit'])) {
    echo $course = $_POST['course'];
    echo $college = $_POST['college'];
    echo $date = $_POST['date'];
    echo $time = $_POST['time'];
    echo $quota = $_POST['quota'];
  


    $query = "INSERT INTO schedule_interview (interview_date,interview_time,quota,course_id,college_id) 
    VALUES ('$date','$time','$quota','$course', '$college')";
    $results = mysqli_query($db, $query);
        if ($results) {
        
            $_SESSION['message'] = "Address updated!";
            header('location: ../schedule.php');
       

        
        } else {
            echo "ERROR: Could not be able to execute $query. ".mysqli_error($db);
        }
}

?> 
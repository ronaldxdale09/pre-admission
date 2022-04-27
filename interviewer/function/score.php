<?php
include ('../../function/db.php');


$record = mysqli_query($db, "SELECT * FROM admissionbatch WHERE is_active=1");
$admission=mysqli_fetch_array($record);
$academic_id =  $admission['admission_id'];



if (isset($_POST['submit'])) {
    echo $id = $_POST['id'];
   
    $action = '';
    echo $cet = $_POST['cet'];
    echo $gpa = $_POST['gpa'];
    echo $score = $_POST['score'];
    echo $inteviewer = $_POST['selected_interviewer'];

    $course_name = $_POST['course1'];

    
    $selectCourse = mysqli_query($db, "SELECT * FROM `coursestbl` where course_name='$course_name'"); 
    $course = mysqli_fetch_array($selectCourse);
    $course_id = $course['course_id'];
    $course_slot = $course['quota'];


    $countStudent = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where course_id ='$course_id' and academic_id ='$academic_id' and userStatus='QUALIFIED' "); 
    $counter = mysqli_fetch_array($countStudent);

    if ($counter[0] > $course_slot){
        $action = 'WAITING';
    }
    else {
        $action = 'QUALIFIED';
    }


    $query = "UPDATE selectedcourse SET userStatus='$action', ic='$inteviewer',inter_score='$score',date=NOW() WHERE selectedCourse_id='$id'";
    $results = mysqli_query($db, $query);
        if ($results) {


        //echo $sender;
        if ($action == 'QUALIFIED'){
            $_SESSION['interview'] = "qualified";
            header('location: ../interview.php');
        }
        else{
            $_SESSION['waiting'] = "Address updated!";
            header('location: ../interview.php');
        }
           
            
            
        } else {
            echo "ERROR: Could not be able to execute $query. ".mysqli_error($db);
        }
}

?> 
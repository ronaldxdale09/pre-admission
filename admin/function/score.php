<?php
include ('../../function/db.php');

if (isset($_POST['submit'])) {
    echo $id = $_POST['id'];
    $action = 'QUALIFIED';
    $date = date('m/d/Y h:i:s a', time()); 
    echo $cet = $_POST['cet'];
    echo $gpa = $_POST['gpa'];
    echo $score = $_POST['score'];
    echo $inteviewer = $_POST['selected_interviewer'];




    $query = "UPDATE selectedcourse SET userStatus='$action', ic='$inteviewer',inter_score='$score' WHERE selectedCourse_id='$id'";
    $results = mysqli_query($db, $query);
        if ($results) {
        //echo $sender;
            $_SESSION['interview'] = "Address updated!";
            
            header('location: ../interview.php');
        } else {
            echo "ERROR: Could not be able to execute $query. ".mysqli_error($db);
        }
}

?> 
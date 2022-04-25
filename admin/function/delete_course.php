<?php
    include '../../function/db.php';
    $course_id = $_POST['course_id'];
    $college_id = $_POST['college_id'];
    $sql = "DELETE FROM coursestbl WHERE course_id=$course_id";
    
    if(mysqli_query($db,$sql)){
    echo "	<script type='text/javascript'>
        window.location='../course.php?college=$college_id';
    </script>";
    }
    else{
        echo "Error: Could not be able to execute $sql. " .mysqli_error($db);
    }
?>
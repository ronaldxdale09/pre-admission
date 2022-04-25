<?php
    include '../../function/db.php';

    $college_id =  $_REQUEST['college_id'];
    $course_id = $_REQUEST['course_id'];
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $sql = "UPDATE coursestbl SET course_name='$name',course_description='$description' WHERE course_id=$course_id";

    if(mysqli_query($db,$sql)){
        echo "	<script type='text/javascript'>
            window.location='../course.php?college=$college_id';
        </script>";
    }

	else
	{
		echo "Error: Could not be able to execute $sql. " .mysqli_error($db);
	}
?>
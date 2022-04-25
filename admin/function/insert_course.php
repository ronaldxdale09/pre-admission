<?php
    include '../../function/db.php';

    $college_id =  $_REQUEST['college_id'];
    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];

    $sql = "INSERT INTO coursestbl(college_id,course_name,course_description) VALUES ($college_id,'$name','$description')";

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
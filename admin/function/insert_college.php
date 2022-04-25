<?php
    include '../../function/db.php';

    $name = $_REQUEST['name'];
    $description = $_REQUEST['description'];
    $sql = "INSERT INTO college(college_name,college_description) VALUES ('$name','$description')";

    if(mysqli_query($db,$sql)){
        echo "	<script type='text/javascript'>
            window.location='../college.php';
        </script>";
    }

	else
	{
		echo "Error: Could not be able to execute $sql. " .mysqli_error($db);
	}
?>
<?php
    include '../../function/db.php';

    $start_date = $_REQUEST['start-date'];
    $end_date = $_REQUEST['end-date'];
    $schoolyear = $_REQUEST['schoolyear'];

    $sql = "UPDATE admissionbatch SET is_active=0 WHERE 1";
    mysqli_query($db,$sql);

    $sql = "INSERT INTO admissionbatch(start_date,end_date,is_active,schoolyear) VALUES ('$start_date','$end_date',1,'$schoolyear')";
    if(mysqli_query($db,$sql)){
        echo "	<script type='text/javascript'>
            window.location='../admission_officer.php';
        </script>";
    }

	else
	{
		echo "Error: Could not be able to execute $sql. " .mysqli_error($db);
	}
?>
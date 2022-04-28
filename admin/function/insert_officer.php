<?php
    include '../../function/db.php';

    $fname =  $_POST["firstname"];
    echo $fname;
    $lname =  $_POST["lastname"];
    $email =  $_POST['email'];
    $password =  $_POST['password'];
    $contactno =  $_POST['contactno'];
    $address =  $_POST['address'];
    $college_id =  $_POST['college'];

   
    $sql = "INSERT INTO `users`(`fname`, `lname`, `email`, `contactNo`, `address`, `user_type`, `password`) VALUES ('$fname','$lname','$email','$contactno','$address','admission','$password')";

    if(mysqli_query($db,$sql)){
        $user_id = $db->insert_id;
        $sql = "INSERT INTO admission_officer(user_id,college_id) VALUES ($user_id,$college_id)";
        mysqli_query($db,$sql);

        echo "	<script type='text/javascript'>
            window.location='../admission_officer.php';
        </script>";
    }

	else
	{
		echo "Error: Could not be able to execute $sql. " .mysqli_error($db);
	}
?>
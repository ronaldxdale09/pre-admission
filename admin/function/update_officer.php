<?php
    include '../../function/db.php';

    $user_id = $_POST['user_id'];
    $fname =  $_POST["firstname"];
    $lname =  $_POST["lastname"];
    $email =  $_POST['email'];
    $contactno =  $_POST['contactno'];
    $address =  $_POST['address'];


    //Generate New Password
    $password = '';
    if(isset($_POST['password-checkbox'])){
        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $password = $randomString; #DALE Email password to email given
        $sql = "UPDATE users SET fname='$fname',lname='$lname',email='$email',contactNo='$contactno',address='$address',password='$password' WHERE id=$user_id";
    }
    else{
        $sql = "UPDATE users SET fname='$fname',lname='$lname',email='$email',contactNo='$contactno',address='$address' WHERE id=$user_id";
    }

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
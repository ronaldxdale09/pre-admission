<?php
    include '../../function/db.php';
    $user_id = $_POST['user_id'];
    $ao_id = $_POST['ao_id'];
    $sql = "DELETE FROM admission_officer WHERE ao_id=$ao_id";    
    if(mysqli_query($db,$sql)){

        $sql = "DELETE FROM users WHERE id=$user_id";
        mysqli_query($db,$sql);    

        echo "	<script type='text/javascript'>
            window.location='../admission_officer.php';
        </script>";
    }
    else{
        echo "Error: Could not be able to execute $sql. " .mysqli_error($db);
    }
?>
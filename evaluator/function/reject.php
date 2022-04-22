<?php
include ('../../function/db.php');

if (isset($_POST['reject'])) {
    $id = $_POST['id'];
    $reason = $_POST['reason'];
    $action = 'REJECTED';


    
    $selectedReason="";
    foreach($reason as $chk)  
    {  
       $selectedReason .= $chk.",";  
    } 
        


    $query = "UPDATE selectedcourse SET userStatus='$action',date=NOW(),rejectReason='$selectedReason' WHERE selectedCourse_id='$id'";
    $results = mysqli_query($db, $query);
        if ($results) {
        //echo $sender;
            $_SESSION['message'] = "Address updated!";
            
            header('location: ../index.php');
        } else {
            echo "ERROR: Could not be able to execute $query. ".mysqli_error($db);
        }
}

?> 
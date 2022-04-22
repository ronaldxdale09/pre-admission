<?php
include ('../../function/db.php');

if (isset($_POST['accept'])) {
    $id = $_POST['id'];
    $action = 'PREQUALIFIED';



    $query = "UPDATE selectedcourse SET userStatus='$action',date=NOW() WHERE selectedCourse_id='$id'";
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
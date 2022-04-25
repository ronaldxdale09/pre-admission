<?php
include ('../../function/db.php');

if (isset($_POST['update'])) {
    echo $id = $_POST['id'];
    echo $cet = $_POST['cet'];
    echo $gpa = $_POST['gpa'];
    echo $slots = $_POST['slot'];

    

    $query = "UPDATE coursestbl SET cet_req='$cet', gpa_req='$gpa',quota='$slots' WHERE course_id='$id'";
    $results = mysqli_query($db, $query);
        if ($results) {
        //echo $sender;
            $_SESSION['update'] = "Address updated!";
            
            header('location: ../index.php');
        } else {
            echo "ERROR: Could not be able to execute $query. ".mysqli_error($db);
        }
}

?> 
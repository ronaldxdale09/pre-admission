<?php
 include('../../function/db.php');




 if (isset($_POST['next'])) { // if save button on the form is clicked
    // name of the uploaded file

    $collegeID = $_POST['college'];
    $courseID = $_POST['course'];
    $cetValue = $_POST['cetvalue'];
    $gpaValue = $_POST['gpavalue'];




    $id = $_SESSION['id'];
    $date = date("Ymd");
    $today = date('Y:m:d', strtotime($date));

    
    $cet = $_FILES['cetfile']['name'];
    $moral = $_FILES['moralfile']['name'];
    $gpa = $_FILES['gpafile']['name'];

    // get academic year
    $query    = "SELECT * FROM `admissionbatch` WHERE is_active=1";
    $result = mysqli_query($db, $query) or die(mysql_error());
    $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    $admission = $row['admission_id'];

    
   


    // destination of the file on the server
    $destination = '../../files_upload/attachment/' . $cet;
    $destination2 = '../../files_upload/attachment/' . $moral;
    $destination3 = '../../files_upload/attachment/' . $gpa;


    // get the file extension
    $extension1 = pathinfo($cet, PATHINFO_EXTENSION);
    $extension2 = pathinfo($moral, PATHINFO_EXTENSION);
    $extension3 = pathinfo($gpa, PATHINFO_EXTENSION);


    // the physical file on a temporary uploads directory on the server
    $file1 = $_FILES['cetfile']['tmp_name'];
    $file2 = $_FILES['moralfile']['tmp_name'];
    $file3 = $_FILES['gpafile']['tmp_name'];
    $size = $_FILES['cetfile']['size'];



    // $checking = "SELECT * FROM selectedcourse WHERE user_id='$id'";
    // $res_checking = mysqli_query($db, $checking);


    // if (mysqli_num_rows($res_checking) > 0) {
    //     header("location:../index.php");
    //     $_SESSION['error'] = 'error';
    // }
     if (!in_array($extension1, ['zip', 'pdf', 'docx', 'jpeg', 'jpg', 'png'])) {
        echo "You file extension must be .zip, .pdf, .docx , .jpeg, .jpg, or .png";
    } elseif ($_FILES['cetfile']['size'] > 10000000) { // file shouldn't be larger than 10Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        move_uploaded_file($file2, $destination2);
        move_uploaded_file($file3, $destination3);
        if (move_uploaded_file($file1, $destination)) {
            
            $sql = "INSERT INTO attachment (cet_path,gpa_path,gmoral_path,user_id,cetValue,gpaValue) VALUES ('$cet','$moral','$gpa','$id','$cetValue','$gpaValue')";
            if (mysqli_query($db, $sql)) {
                $file_id = mysqli_insert_id($db);
               $query1= mysqli_query($db,"INSERT INTO selectedcourse (user_id,course_id,file_id,date,userStatus,college_id,academic_id) VALUES ('$id','$courseID','$file_id','$today','PENDING','$collegeID','$admission')") ;   
            //echo $courseID;
            //echo $id;
            
            header("location:../index.php");
            $_SESSION['message'] = 'Successful';
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
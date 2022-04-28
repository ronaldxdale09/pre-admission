<?php
include ('../../function/db.php');
require "PHPMailer/PHPMailerAutoload.php";


$record = mysqli_query($db, "SELECT * FROM admissionbatch WHERE is_active=1");
$admission=mysqli_fetch_array($record);
$academic_id =  $admission['admission_id'];


if (isset($_POST['submit'])) {
    echo $id = $_POST['id'];
   
    $action = '';
    echo $cet = $_POST['cet'];
    echo $gpa = $_POST['gpa'];
    echo $score = $_POST['score'];
    echo $inteviewer = $_POST['selected_interviewer'];



    // for email

    
    $selectStudent = "SELECT * from selectedcourse LEFT JOIN users ON selectedcourse.user_id = users.id
    LEFT JOIN coursestbl ON selectedcourse.course_id = coursestbl.course_id
     WHERE selectedCourse_id='$id'";
    $result = mysqli_query($db, $selectStudent);
    $student = mysqli_fetch_array($result);
    $email = $student['email'];
    $firstname = $student['fname'];
    $fullname = $student['fname'] . ' ' . $student['lname'];
    $course = $student['course_name'];

    // end email

    $course_name = $_POST['course1'];

    
    $selectCourse = mysqli_query($db, "SELECT * FROM `coursestbl` where course_name='$course_name'"); 
    $course = mysqli_fetch_array($selectCourse);
    $course_id = $course['course_id'];
    $course_slot = $course['quota'];


    $countStudent = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where course_id ='$course_id' and academic_id ='$academic_id' and userStatus='QUALIFIED' "); 
    $counter = mysqli_fetch_array($countStudent);

    if ($counter[0] > $course_slot){
        $action = 'WAITING';
    }
    else {
        $action = 'QUALIFIED';
    }


    $query = "UPDATE selectedcourse SET userStatus='$action', ic='$inteviewer',inter_score='$score',date=NOW() WHERE selectedCourse_id='$id'";
    $results = mysqli_query($db, $query);
        if ($results) {


        //echo $sender;
        if ($action == 'QUALIFIED'){
            $_SESSION['interview'] = "qualified";
            header('location: ../interview.php');

 // PHP MAILER START
 $phpmailer = new PHPMailer();

 try {
     //Server settings

     $phpmailer->isSMTP();
     $phpmailer->Host = 'smtp.gmail.com';
     $phpmailer->SMTPAuth = true;
     $phpmailer->Port = 587;
     $phpmailer->Username = 'notificationemailtest30@gmail.com';
     $phpmailer->Password = 'temporaryemail1999';


     $phpmailer->setFrom('testemailrandomidk@gmail.com', 'WMSU PRE-ADMISSION');
     $phpmailer->addAddress($email);


     //Content
     $phpmailer->isHTML(true);                                  //Set email format to HTML
     $phpmailer->Subject = 'NOTIFICATION | WMSU PREADMISSION'; 
     $phpmailer->Body    = "
         <center>
         <img src='' alt='header' border='0'>
             <h1>Hello $firstname ! </h1>

             <h3>Congratulation ! You are now part of $course </h3> <br>
             


         </center>
         <br>
         <hr>
         <p> Information : </p>
         <table>
             <tr>
                 <th>Student Name</th>
                 <th>Course Applied</th>
                 <th>Interview Score</th>
                 <th>Status</th>
                 
             </tr>
             <tr>
                 <td>$fullname</td>
                 <td>$course</td>
                 <td>$scores</td>
                 <td>$action</td>
             </tr>

         </table>

         </p>
     <hr>
     
     
 ";

     $phpmailer->send();
     $_SESSION['message'] = "Address updated!";
     header('location: ../index.php');
 } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$phpmailer->ErrorInfo}";
 }


        }
        else{
            $_SESSION['waiting'] = "Address updated!";
            header('location: ../interview.php');




        }
           
            
            
        } else {
            echo "ERROR: Could not be able to execute $query. ".mysqli_error($db);
        }
}

?> 
<?php
include ('../../function/db.php');
require "PHPMailer/PHPMailerAutoload.php";


if (isset($_POST['submit'])) {
    echo $id = $_POST['id'];
    echo $interview = $_POST['sched_time'];
    $action = 'INTERVIEW';


    
    $selectStudent = "SELECT * from selectedcourse LEFT JOIN users ON selectedcourse.user_id = users.id
    LEFT JOIN coursestbl ON selectedcourse.course_id = coursestbl.course_id
    LEFT JOIN schedule_interview ON selectedcourse.interview_sched = schedule_interview.schedule_interview_id
     WHERE selectedCourse_id='$id'";
    $result = mysqli_query($db, $selectStudent);
    $student = mysqli_fetch_array($result);
    $email = $student['email'];
    $firstname = $student['fname'];
    $fullname = $student['fname'] . ' ' . $student['lname'];
    $course = $student['course_name'];

    $interview_date = $student['interview_date'];
    $interview_time = $student['interview_time'];




    

    $query = "UPDATE selectedcourse SET userStatus='$action', interview_sched='$interview',date=NOW() WHERE selectedCourse_id='$id'";
    $results = mysqli_query($db, $query);
        if ($results) {
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

                    <h3>Your Interview Schedule : </h3> <br>
                    <table>
                    <tr>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Course</th>
                    </tr>
                    <tr>
                        <td>$interview_date</td>
                        <td>$interview_date</td>
                        <td>$course</td>
                    </tr>

                </table>


                </center>
                <br>
                <hr>
                <p> Information : </p>
                <table>
                    <tr>
                        <th>Student Name</th>
                        <th>Course Applied</th>
                        <th>Status</th>
                    </tr>
                    <tr>
                        <td>$fullname</td>
                        <td>$course</td>
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

        
        } else {
            echo "ERROR: Could not be able to execute $query. ".mysqli_error($db);
        }
}

?> 
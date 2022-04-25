<?php
    require('db.php');
    // When form submitted, check and create user session.
    if (isset($_POST['login'])) {
        $email = stripslashes($_REQUEST['email']);    // removes backslashes
        $email = mysqli_real_escape_string($db, $email);
        $password = stripslashes($_REQUEST['password']);

        $password = mysqli_real_escape_string($db, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE email='$email'
                     AND password='$password'";

        $result = mysqli_query($db, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        if ($rows == 1) {
   

            if ($row['user_type'] == 'admin') {
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $email;
                $_SESSION['successlog'] = "login successful"; 
                header("Location: ../admin/index.php");  
                 }
                 elseif ($row['user_type'] == 'user'){
        
                        $_SESSION['email'] = $email;
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['fname'] = $row['fname'];
                        $_SESSION['lname'] =$row['lname'];
                        $_SESSION['applicantID'] = $row['applicantid'];
                        $_SESSION['login'] = "login successful"; 
                  header("Location: ../student/index.php");
                    }

                 elseif ($row['user_type'] == 'interviewer'){
        
                        $_SESSION['email'] = $email;
                        $_SESSION['id'] = $row['id'];
                        $_SESSION['fname'] = $row['fname'];
                        $_SESSION['lname'] =$row['lname'];

                        $_SESSION['login'] = "login successful"; 
                  header("Location: ../interviewer/index.php");
                    }

                

                elseif ($row['user_type'] == 'evaluator'){
    
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] =$row['lname'];

                    $_SESSION['login'] = "login successful"; 
              header("Location: ../evaluator/index.php");
                }

                elseif ($row['user_type'] == 'admission'){
    
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['fname'] = $row['fname'];
                    $_SESSION['lname'] =$row['lname'];

                    $_SESSION['login'] = "login successful"; 
              header("Location: ../admission-officer/index.php");
                }


        } else {
            echo "<div class='form'>
                  <h3>Incorrect email/password.</h3><br/>
                  <p class='link'>Click here to <a href='../index.php'>Login</a> again.</p>
                  </div>";
        }
    }
?>
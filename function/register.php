
  
<?php 
 include('db.php');
                        if (isset($_POST['register'])) {
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $appId =  $_SESSION['applicantid'] ;
    
                            $type = $_POST['studentType'];
                          
                            // $select    = "SELECT * FROM `users` WHERE email='$email'
                            // AND password='$password'";
                            // $result = mysqli_query($db, $query) or die(mysql_error());
                            // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                            $query = "INSERT INTO users (applicantid,fname, lname,email,password, user_type,studentType) 
                            VALUES ('$appId','$fname','$lname','$email', '$password', 'user','$type')";
                                $results = mysqli_query($db, $query);
                                    if ($results) {


                                        $_SESSION['email'] = $email;
                                        $_SESSION['id'] = $row['id'];
                                        $_SESSION['fname'] = $row['fname'];
                                        $_SESSION['lname'] =$row['lname'];
                                        $_SESSION['applicantID'] = $row['applicantid'];
                                        $_SESSION['login'] = "login successful"; 

                                        header("Location: ../student/index.php");
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".msqli_error($con);
                                    }
                                //exit();
                                }
 ?>
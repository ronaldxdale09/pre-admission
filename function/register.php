
  
<?php 
 include('db.php');
                        if (isset($_POST['register'])) {
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $email = $_POST['email'];
                            $password = $_POST['password'];
                            $appId =  $_SESSION['applicantid'] ;
    
                            $type = $_POST['studentType'];
                          


                            $query = "INSERT INTO users (applicantid,fname, lname,email,password, user_type,studentType) 
                            VALUES ('$appId','$fname','$lname','$email', '$password', 'user','$type')";
                                $results = mysqli_query($db, $query);
                                    if ($results) {

                                        $_SESSION['$fname'] = $fname;
                                        $_SESSION['$lname'] = $lname;
                                        $_SESSION['$email'] = $email;

                                        header("Location: ../student/UserProfile.php");
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".msqli_error($con);
                                    }
                                //exit();
                                }
 ?>
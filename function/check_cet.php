<?php
include('db.php');
                    if (isset($_POST['submit'])) {
                        $applicantid = $_POST['applicant'];
                       

                       
                        $checking = "SELECT * FROM cetresult WHERE applicantid='$applicantid'";
                        $account =  "SELECT * FROM users WHERE applicantid='$applicantid'";
                        

                        

                        $checking_result =  mysqli_query($db, $checking);
                        $account_result = mysqli_query($db,$account);

                        $arr= mysqli_fetch_array($checking_result);

                  
                        if (mysqli_num_rows($checking_result) < 1) {
                            
                            $_SESSION['unrecognized'] ='unrecognized'; 
                            header("location: ../index.php");
                            
                        }
                        
                        else if (mysqli_num_rows($account_result) > 0) {
                            $_SESSION['exist'] ='exist'; 
                            header("location: ../index.php");
                            
                        }
                        
                        else {
                            $_SESSION['applicantid'] = $applicantid;
                            // $fullName = $arr['fname'] . " " . $arr['lname'];
                            $_SESSION['fname'] = $arr['fname'];
                            $_SESSION['lname'] = $arr['lname'];
                            header("location: ../registration.php");
                          
                          

                        }
                    } 



                    ?>
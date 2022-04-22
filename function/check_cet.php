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
                            echo "Sorry your we don't recognize your Applicant ID<br>";
                            echo "<div class='form'>
                            <p class='link pb-2'>Click here to <a href='cet_check.php'>Try again</a></p>
                            </div>";
                        }
                        
                        else if (mysqli_num_rows($account_result) > 0) {
                            echo "Account already exist";
                            echo "<br><br><div class='form'>
                            <p class='link pb-2'>Click here to <a href='cet_check.php'>Try again</a></p>
                            </div>";
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
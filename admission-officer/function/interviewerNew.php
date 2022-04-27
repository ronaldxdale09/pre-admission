
  
<?php 
include ('../../function/db.php');
                        if (isset($_POST['interviewer'])) {
                            $fname = $_POST['fname'];
                            $lname = $_POST['lname'];
                            $email = $_POST['email'];
                            $college = $_POST['college_id'];

                            $password = $_POST['password'];
                            $type ='interviewer';
                       

                            $query = "INSERT INTO users (fname, lname,email,password, user_type) 
                            VALUES ('$fname','$lname','$email', '$password','$type')";
                                $results = mysqli_query($db, $query);
                                    if ($results) {

                                        $last_id = $db->insert_id;

                                        $queryinterviewer = "INSERT INTO interviewer (user_id,college_id) 
                                        VALUES ('$last_id','$college')";
                                        $newresult = mysqli_query($db, $queryinterviewer);


                                        header("Location: ../interviewer_account.php");
                                        exit();
                                    } else {
                                        echo "ERROR: Could not be able to execute $query. ".msqli_error($con);
                                    }
                                //exit();
                                }
 ?>
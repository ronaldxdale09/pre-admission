<?php   
 $studentInfo = mysqli_query($db, "SELECT * from cetresult where 	applicantid  ='".$_SESSION['applicantID']."'"); 
   $arr = mysqli_fetch_array($studentInfo);?>

<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Student's Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="function/accept.php" enctype="multipart/form-data">
                    <input type="hidden" name="size" value="1000000">
                    <div class="row">
                        <div class="col-md-4">
                            <div style="width: 370px; height: 250;" class="text-center" id="my_camera">
                                <div id='mypic'>

                                </div>
                            </div>

                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col">
                                <input type="text" name="id" id="id" hidden>
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Firstname"
                                            name="lname" id="lname" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Middlename"
                                            name="fname" id="fname" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Middle Name</label>
                                        <input type="text" class="form-control" placeholder="Enter Lastname"
                                            name="lname" id="student_midname" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                            id="email" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Birthdate</label>
                                        <input type="text" class="form-control" placeholder="" name="birthdate"
                                            id="birthdate" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input type="gender" class="form-control" name="sex" id="sex" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>Contact Number</label>
                                        <input type="text" class="form-control" placeholder="Enter Contact Number"
                                            name="contactNo" id="contactNo" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" name="address" required placeholder="Address"
                                    id="address" readonly></textarea>
                            </div>
                            <!--START  -->

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>CET SCORE</label>
                                        <input type="email" class="form-control" placeholder="Enter Email" name="cet"
                                            id="cet" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>GPA </label>
                                        <input type="email" class="form-control" placeholder="Enter Email" name="gpa"
                                            id="gpa" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                </div>
                            </div>



                            <!--END  -->

                            <!--START  -->

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label>ATTACHED CET</label>
                                        <div id='cet_path'>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>ATTACHED GPA</label>
                                        <div id='gpa_path'>
                                        </div>
                                    </div>

                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label>ATTACHED GOOD MORAL</label>
                                        <div id='gmoral_path'>
                                        </div>
                                    </div>
                                </div>



                                <!--END  -->
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name='accept' class="btn btn-success">ACCEPT</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">RETURN</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- reject student -->

<!-- DISAPPROVE ACTION -->
<div class="modal fade" id="rejectStudent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">REJECT STUDENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="function/reject.php" method="POST">

                <div class="modal-body">


                <input type="text" name="id" id="id1" hidden>

                    <div class="form-group">
                        <label>First Name :</label>
                        <input type="name" name="fname" id="fname1" class="form-control" readonly>
                    </div>

                    <div class="form-group">
                        <label>Last Name :</label>
                        <input type="text" name="lname" disabled="disabled" class="form-control" id="lname1">
                    </div>

                    <div class="form-group">
                        <label for="name">
                            Selected Course:</label>
                        <input type="text" name="course" disabled="disabled" class="form-control" id="course1">
                    </div>
                    <div class="form-group">
                        <label for="name">
                            CET :</label>
                        <input type="text" name="cet" disabled="disabled" class="form-control" id="cet1">
                    </div>
                    <div class="form-group">
                        <label for="name">
                            GPA :</label>
                        <input type="text" name="gpa" disabled="disabled" class="form-control" id="gpa1">
                    </div>
                    <!-- attached -->

                    <div class="form-group">
                        <label for="name">
                            Attached CET:</label>
                            <div id='cet_path1'>
                                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">
                        Attached GPA :</label>
                        <div id='gpa_path1'>
                                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">
                        Attached Good Moral :</label>
                        <div id='gmoral_path1'>
                                        </div>
                    </div>
                     <!-- end attached -->
                    <div class="form-group">
                        <label for="details">
                            Reason:</label> <br>
                        <label class="checkbox-inline">
                            <?php 
                              $sql= mysqli_query($db,"SELECT * FROM rejection_reason");
                              while($r = mysqli_fetch_array($sql))
                              {
                              ?>
                            <input type="checkbox" name="reason[]" id="reason[]" value="<?php echo $r['name'] ?> " require>
                            <?php echo $r['name'] ?> 
                            <?php 
                              }
                              
                              ?>
                            </select>
                    </div>


                </div>
                <div class="modal-footer">

                    <button type="accept" name="reject" id="reject" class="btn btn-success">REJECT</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>

                </div>
            </form>

        </div>
    </div>
</div>
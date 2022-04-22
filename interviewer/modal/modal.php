<?php   

   
   $listOfCollege = "SELECT * FROM coursestbl ";
   $result = mysqli_query($db, $listOfCollege);
   $courses='';
   while($arr = mysqli_fetch_array($result))
   {
   $courses .= '<option value="'.$arr["course_id"].'">'.$arr["course_name"].'</option>';
   } 
   
   ?>

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
                                <button class="btn btn-success"> PRE-QUALIFIED </button>
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
                            </div>
                            <!--END  -->
                            <hr>

                            <BR>
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



<!-- SCORE ACTION -->
<div class="modal fade" id="score" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">INTERVIEW SCORE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="function/score.php" method="POST">

                <div class="modal-body">


                    <input type="text" name="id" id="id1" hidden>
                    <input type="text" name="cet" id="cet1" hidden>
                    <input type="text" name="gpa" id="gpa1" hidden>


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



                    <hr> <br>
                    <div class="form-group">
                        <label for="name">
                            Interviewer Course :</label>
                        <select name="course" id='course' class="form-control action college_list" required>
                            <option disabled="disabled" selected="selected">Select Course</option>
                            <?php echo $courses; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <div id='interviewer_section'>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name">
                            <?php include('rating.php') ?>
                    </div>
                    <!-- attached -->


                </div>
                <div class="modal-footer">

                    <button type="accept" name="submit" class="btn btn-success">SUBMIT</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>

                </div>
            </form>

        </div>
    </div>
</div>


<!-- ASSIGN SCHEDULE AND INSTRUCTOR -->


<!-- SCORE ACTION -->
<div class="modal fade" id="schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">INTERVIEW SCHEDULE</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="function/assign_sched.php" method="POST">

                <div class="modal-body">


                    <input type="text" name="id" id="id2" hidden>

                    <center>
                        <div class="form-group">
                            <label for="name">
                                Course :</label>
                            <select name="course" id='sched_course' class="form-control action college_list" required>
                                <option disabled="disabled" selected="selected">Select Course</option>
                                <?php echo $courses; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <div id='schedule_date'></div>
                        </div>

                        <div class="form-group">
                            <div id='schedule_time'></div>
                        </div>




                        <!-- attached -->

                    </center>
                </div>
                <div class="modal-footer">

                    <button type="accept" name="submit" class="btn btn-success">SUBMIT</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>

                </div>
            </form>

        </div>
    </div>
</div>


<script type="text/javascript">
$(document).ready(function() {
    // Country dependent ajax
    $("#sched_course").on("change", function() {
        var courseId = $(this).val();

        $.ajax({
            url: "modal/fetchScheduleDate.php",
            type: "POST",
            cache: false,
            data: {
                courseId: courseId
            },
            cache: false,
            success: function(course) {
                $("#schedule_date").html(course);
            }
        });

    });
});
</script>
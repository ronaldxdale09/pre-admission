<?php
   include('include/header.php');
   
   
   
   $listOfCourse = "SELECT * FROM coursestbl WHERE college_id ='$college_id' ";
   $result = mysqli_query($db, $listOfCourse);
   $courses='';
   while($arr = mysqli_fetch_array($result))
   {
   $courses .= '<option value="'.$arr["course_id"].'">'.$arr["course_name"].'</option>';
   }
   
   
   ?>
<?php if (isset($_SESSION['email'])) : ?>
<header class="page-header">
   <nav>
      <button class="toggle-mob-menu" aria-expanded="false" aria-label="open menu">
      <i class="fa fa-bars"></i>
      </button>
      <a href="../index.html">
      <img class="logo mx-auto" src="../collegeimg/<?php echo $row['college_img'] ?>" alt="ics logo">
      </a>
      <ul class="admin-menu">
         <li class="menu-heading">
            <h3>Waiting List</h3>
         </li>
         <li>
            <a href="index.php">
            <i class="fa fa-list" aria-hidden="true"><span>PREQUALIFIED</span></i>
            </a>
         </li>
         <li>
            <a href="interview.php" >
            <i class="fa fa-list" aria-hidden="true"><span>INTERVIEW</span></i>
            </a>
         </li>
         <li>
            <a href="qualified.php" >
            <i class="fa fa-list" aria-hidden="true"><span>QUALIFIED</span></i>
            </a>
         </li>
         <li>
            <a href="waiting.php"  >
            <i class="fa fa-list" aria-hidden="true"><span>WAITING</span></i>
            </a>
         </li>

         <li>
            <a href="Schedule.php"  class="active" >
            <i class="fa fa-calendar" aria-hidden="true"><span>SCHEDULE</span></i>
            </a>
         </li>
         <li>
            <a href="../index.php?logout='1'">
            <i class="fa fa-sign-out"><span>logout</span></i>
            </a>
         </li>
      </ul>
   </nav>
</header>
<?php endif ?>
<section class="page-content">
   <section class="grid">
      <article>
         <div class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mx-3 my-3">
         <div style='padding:10px;'>
            <h2 style='margin-bottom:10px;'>Interview Schedule</h2>
            <h5 style='margin-bottom:0px;'>
               <?php echo $college?>
            </h5>
            <h6 style='margin-bottom:0px;'>
               Current Active Admission Schedule: <?php
                  $record = mysqli_query($db, "SELECT * FROM admissionbatch WHERE is_active=1");
                  $admission=mysqli_fetch_array($record);
                  if(isset($admission)){
                      echo date('M d',strtotime($admission['start_date']))." to ".date('M d',strtotime($admission['end_date'])).", S.Y. ".$admission['schoolyear'];
                  }
                  ?>
            </h6>
            <hr>
            <div style='margin:0; padding:0;'>
               <button class='btn btn-success open-modal' style='margin-right:10px;'>New Schedule</button>
            </div>
         </div>
         <div style='padding:10px;'>
            <table class="table table-sm table-striped table-bordered table-hover" id="list_course">
               <thead class="thead">
                  <?php 
                     $results = mysqli_query($db, "SELECT * FROM schedule_interview LEFT JOIN coursestbl ON schedule_interview.course_id= coursestbl.course_id  WHERE schedule_interview.college_id = '$college_id'");
                     ?>
                  <tr>
                     <th>Course</th>
                     <th>Interview Date</th>
                     <th>Time</th>
                     <th>Quota</th>
                  </tr>
               </thead>
               <tbody class="tbody">
                  <?php while ($row = mysqli_fetch_array($results)) { ?>
                  <tr>
                     <td style="display:none"><?php echo $row['schedule_interview_id']; ?> </td>
                     <td><?php echo $row['course_name']; ?></td>
                     <td><?php echo $row['interview_date']; ?> </td>
                     <td><?php echo $row['interview_time']; ?> </td>
                     <td><?php echo $row['quota']; ?></td>
                  </tr>
                  <?php
                     }
                     ?>
               </tbody>
            </table>
         </div>
      </article>
   </section>
</section>
<div class="modal" name='3' id='schedule' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
   <form class="modal-container" method="post" action="function/insert_admissionbatch.php">
      <h4 style='margin-bottom:20px;'>Create Admission Schedule</h4>
      <div class="container">
         <div class="row" style='margin-bottom:15px;'>
            <div class="col-md-10 offset-md-1 p-0">
               <h5>Start Date</h5>
            </div>
            <input type='date' id='date-start' name='start-date' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' onchange='validateDate()'>
         </div>
         <div class="row" style='margin-bottom:15px;'>
            <div class="col-md-10 offset-md-1 p-0">
               <h5>End Date</h5>
            </div>
            <input type='date' id='date-end' name='end-date' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' onchange='validateDate()'>
         </div>
         <div class="row" style='margin-bottom:15px;'>
            <div class="col-md-10 offset-md-1 p-0">
               <h5>School Year</h5>
            </div>
            <select name='schoolyear' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'>
               <option value=''>------</option>
               <?php
                  $curYear = date("Y");
                  #date('Y', strtotime(' + 5 years'));
                  for($i = 0; $i <= 2; $i++){
                      ?>
               <option value='<?php echo date("Y",strtotime($curYear." + ".$i." years"))."-".date("Y",strtotime($curYear." + ".($i+1)." years")); ?>'><?php echo date("Y",strtotime($curYear." + ".$i." years"))."-".date("Y",strtotime($curYear." + ".($i+1)." years")); ?></option>
               <?php
                  }
                  ?>
            </select>
         </div>
         <div class="row">
            <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-schedule-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-primary' style='margin-left:20px;flex:1;' value='Update'></div>
         </div>
      </div>
   </form>
</div>
</body>


<!-- new sched modal ACTION -->
<div class="modal fade" id="new_schedule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
   aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">INTERVIEW SCHEDULE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="function/new_sched.php" method="POST">
            <div class="modal-body">

            <input type='text'  name='college' value='<?php echo $college_id?>' hidden>


            <div class="form-group">
            <h5>Course</h5>
                        <select name="course" id='course'class="form-control action college_list" style='border:solid black 1px; padding:2 5 2 5;' >
                           <option disabled="disabled" selected="selected">Select Course</option>
                           <?php echo $courses; ?>
                        </select>
                     </div>


               <div class="row" style='margin-bottom:15px;'>
                  <div class="col-md-10 offset-md-1 p-0">
                     <h5>Start Date</h5>
                  </div>
                  <input type='date' id='date' name='date' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' >
               </div>

               <div class="row" style='margin-bottom:15px;'>
                  <div class="col-md-10 offset-md-1 p-0">
                     <h5>Start Time</h5>
                  </div>
                  <input type='time' id='time' name='time' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' >
               </div>

               <div class="row" style='margin-bottom:15px;'>
                  <div class="col-md-10 offset-md-1 p-0">
                     <h5>Quota</h5>
                  </div>
                  <input type='number' id='quota' name='quota' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' onchange='validateDate()'>
               </div>
            
            </div>
            <div class="modal-footer">
               <button type="accept" name="submit" class="btn btn-success">SUBMIT</button>
               <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
            </div>
         </form>
      </div>
   </div>
</div>
<?php
   include('include/jquery.php');
   ?>
<script>
   //TRANSFER DATA FROM TABLE TO MODAL
   $(document).ready(function() {
       $('.open-modal').on('click', function() {
   
   
           $('#new_schedule').modal('show');
           $tr = $(this).closest('tr');
   
           var data = $tr.children("td").map(function() {
               return $(this).text();
           }).get();
           $('#id').val(data[0]);
           $('#fname1').val(data[1]);
           $('#lname1').val(data[2]);
           $('#course1').val(data[3]);
           $('#cet1').val(data[5]);
           $('#gpa1').val(data[6]);
   
   
       });
   
   });
</script>

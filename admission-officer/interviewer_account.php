<?php
   include('include/header.php');
    
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
            <h3>Interviewer List</h3>
         </li>
         <li>
            <a href="index.php">
            <i class="fa fa-list" aria-hidden="true"><span>Home</span></i>
            </a>
         </li>
         <li>
            <a href="interviewer_account.php" class="active" >
            <i class="fa fa-list" aria-hidden="true"><span>Interviewer</span></i>
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
            <h2 style='margin-bottom:10px;'>Admission Officer</h2>
            <h5 style='margin-bottom:0px;'>
               List of Interviewer Account
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
               <button class='btn btn-success' data-toggle="modal" data-target="#newInterviewer" style='margin-right:10px;'>Add New Interviewer</button>
            </div>
         </div>
         <div style='padding:10px;'>
            <table class="table table-sm table-striped table-bordered table-hover" id="list_course">
               <thead class="thead">
                  <?php 
                     $results = mysqli_query($db, "SELECT * FROM interviewer INNER JOIN users INNER JOIN college WHERE interviewer.user_id = users.id AND interviewer.college_id = college.college_id");
                     ?>
                  <tr>
                     <th style='width:10%;'>ID</th>
                     <th style='width:40%;'>Name</th>
                     <th style='width:40%;'>Course</th>
                     <th >Action</th>
                  </tr>
               </thead>
               <tbody class="tbody">
                  <?php 
                     while ($row = mysqli_fetch_array($results)) { 
                     ?>
                  <tr class='trow' id='<?php echo $row['interviewer_id']; ?>'>
                     <td style='width:10%;' id='course-id-<?php echo $row['ao_id']; ?>'>
                        <?php echo $row['interviewer_id']; ?> 
                     </td>
                     <td style='width:40%;' id='course-name-<?php echo $row['ao_id']; ?>'>
                        <?php echo $row['fname']." ".$row['lname']; ?> 
                     </td>
                     <td style='width:40%;position:relative;' id='course-description-<?php echo $row['ao_id']; ?>'>
                        <?php echo $row['college_name']; ?> 
                     </td>
                     <td>
                  
                           <button class="btn btn-primary trow-btn open-edit-modal" style='margin-right:5px' name='<?php echo $row['ao_id']; ?>'><i class="fa-solid fa-pen-to-square"></i></button>
                           <button class="btn btn-danger trow-btn open-delete-modal" name='<?php echo $row['ao_id']; ?>'><i class="fa-solid fa-trash-can"></i></button>
        
                     </td>
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



</body>


<!-- modal -->
<!-- SCORE ACTION -->
<div class="modal fade" id="newInterviewer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" style='background-color:rgba(0, 0, 0, 0.37);' aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INTERVIEW SCORE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="function/interviewerNew.php" method="POST">
        <div class="modal-body">
          <input type="text" name="college_id" value="<?php echo $college_id ?>" hidden>
          <div class="row">
            <div class="col-md-6">
              <label for="IDofInput">First Name</label>
              <input type="text" name="fname" id="fname" class="form-control">
            </div>
            <div class="col-md-6">
              <label for="IDofInput2">Last Name</label>
              <input type="text" name="lname" id="lname" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label>Email :</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="form-group">
            <label>Password :</label>
            <input type="password" name="password" id="password" class="form-control">
          </div>
          <hr>
          <br>
          <!-- attached -->
        </div>
        <div class="modal-footer">
          <button type="accept" name="interviewer" class="btn btn-success">REGISTER</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">CLOSE</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal end -->
<?php
   include('include/jquery.php');
   include('modal/modal.php');
   ?>
<script src="assets/js/modal.js"></script>
<script>

   $(document).ready(function() {
       // DataTables initialisation
       var table = $('#list_course').DataTable({
           "ordering": false,
   
           dom: 'Bfrtip',
           buttons: [
               'excelHtml5',
               'csvHtml5',
               'pdfHtml5',
               'print',
   
   
   
           ],
   
   
   
       });
   
   });
</script>
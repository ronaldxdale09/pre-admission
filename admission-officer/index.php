<?php
   include('include/header.php');
   // 
   $record = mysqli_query($db, "SELECT * FROM admissionbatch WHERE is_active=1");
   $admission=mysqli_fetch_array($record);
   $academic_id =  $admission['admission_id'];
   // 
    
   $collegeCounter = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where college_id ='$college_id' and academic_id ='$academic_id' "); 
   $c_counter = mysqli_fetch_array($collegeCounter);

   $waitingList = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where college_id ='$college_id' and academic_id ='$academic_id' and userStatus='WAITING' "); 
   $w_counter = mysqli_fetch_array($waitingList);

   $courseCounter = mysqli_query($db, "SELECT COUNT(*) from coursestbl where college_id ='$college_id' "); 
   $course_Counter = mysqli_fetch_array($courseCounter);

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
            <h3><?php echo $college ?></h3>
         </li>
         <li>
            <a href="index.php" class="active">
            <i class="fa fa-list" aria-hidden="true"><span>Home</span></i>
            </a>
         </li>
         <li>
            <a href="interviewer_account.php" >
            <i class="fa fa-list" aria-hidden="true"><span>Interviewer</span></i>
            </a>
         </li>
         <li>
            <a href="evaluator_account.php" >
            <i class="fa fa-list" aria-hidden="true"><span>Evaluator</span></i>
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
   <section class="btn-group">
      <h2>Admission Officer | <?php echo $college ?></h2>
      <br>
   </section>

   <div class="row">
    
    <div class="col-sm-3 offset-sm-0">
       <div class="stat-card">
          <div class="stat-card__content">
             <p class="text-uppercase mb-1 text-muted">Student Application </p>
             <h2 ><i class="text-danger font-weight-bold mr-1"></i>
                    <?php echo    $c_counter[0] ?> </h2>
         
          </div>
          <div class="stat-card__icon stat-card__icon--success">
             <div class="stat-card__icon-circle">
                <i class="fa fa-info"  aria-hidden="true"></i>
             </div>
          </div>
       </div>
    </div>
    <div class="col-sm-3">
       <div class="stat-card">
          <div class="stat-card__content">
             <p class="text-uppercase mb-1 text-muted">Number of Courses</p>
             <h2> <?php echo    $course_Counter[0] ?> </h2>

          </div>
          <div class="stat-card__icon stat-card__icon--primary">
             <div class="stat-card__icon-circle">
                <i class="fa fa-calendar"></i>
             </div>
          </div>
       </div>
    </div>

        <div class="col-sm-3">
       <div class="stat-card">
          <div class="stat-card__content">
             <p class="text-uppercase mb-1 text-muted">Waiting List</p>
             <h2><?php echo $w_counter[0] ?></h2>
            
          </div>
          <div class="stat-card__icon stat-card__icon--primary">
             <div class="stat-card__icon-circle">
                <i class="fa fa-credit-card"></i>
             </div>
          </div>
       </div>
    </div>


 </div>   



   <section class="grid">
      <div class="row">
         <div class="col">
            <div class="form-group">
               <h6 style='margin-bottom:0px;'>
                  Current Active Admission Schedule: <?php
                     if(isset($admission)){
                         echo date('M d',strtotime($admission['start_date']))." to ".date('M d',strtotime($admission['end_date'])).", S.Y. ".$admission['schoolyear'];
                     }
                     ?>
               </h6>
            </div>
         </div>
         <div class="col">
            <div class="form-group">
            </div>
         </div>
         <div class="col">
            <div class="form-group">
               <!-- empty -->
            </div>
         </div>
      </div>
      <!--END  -->
      <article>
         <div
            class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mx-3 my-3">
         <table class="table table-sm table-striped table-bordered table-hover" id="list_course">
            <thead class="thead">
               <?php $results = mysqli_query($db, "SELECT * from coursestbl WHERE  college_id ='".$row['college_id']."'") ?>
               <tr>
                  <th>ID</th>
                  <th> Img </th>
                  <th>Course</th>
                  <th>Quota</th>
                  <th>CET REQUIREMENTS</th>
                  <th>GPA REQUIREMENTS</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody class="tbody">
               <?php while ($row = mysqli_fetch_array($results)) { 


                  $counter = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where academic_id ='$academic_id' AND course_id ='".$row['course_id']."'"); 
                  $countStudent = mysqli_fetch_array($counter);

                  ?>
               <tr>
                  <td><?php echo $row['course_id']; ?> </td>
                  <td>
                     <nobr> <img src="../collegeimg/<?php echo $row['course_img'];?>" alt="..."
                        class="img img-fluid" width="40"></nobr>
                  </td>
                  <td><?php echo $row['course_name']; ?> </td>
                  <td><?php echo $countStudent[0]; ?>/<?php echo $row['quota']; ?> </td>
                  <td><?php echo $row['cet_req']; ?></td>
                  <td><?php echo $row['gpa_req']; ?></td>
                  <td>
                     <a href="qualified.php?course=<?php echo $row['course_id']; ?>"
                        class="btn btn-primary btn-sm"> <i class="fa-solid fa-eye"></i></a>
                     <button type="submit" name=""
                        class="btn btn-success btn-sm settingsBtn"><i class="fas fa-cog"></i></button>
                  </td>
               </tr>
               <?php
                  }
                  ?>
            </tbody>
         </table>
      </article>
   </section>
</section>
</body>
<?php
   include('include/jquery.php');
   
   ?>
<script>
   $(document).ready(function() {
       // Create date inputs
   
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
<script>
   //TRANSFER DATA FROM TABLE TO MODAL
   $(document).ready(function() {
       $('.settingsBtn').on('click', function() {
   
   
           $('#settings').modal('show');
           $tr = $(this).closest('tr');
   
           var data = $tr.children("td").map(function() {
               return $(this).text();
           }).get();
           $('#course_id').val(data[0]);
           $('#course_name').val(data[2]);
           $('#slot').val(data[3]);
           $('#cet').val(data[4]);
           $('#gpa').val(data[5]);
   
   
   
   
       });
   
   });
</script>
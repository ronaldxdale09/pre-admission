<?php 
   include('../function/db.php');
   include('include/bootstrap.php');
   include('include/jquery.php');
  
   
   
      
   $listOfCollege = "SELECT * FROM college ";
   $result = mysqli_query($db, $listOfCollege);
   $colleges='';
   while($arr = mysqli_fetch_array($result))
   {
   $colleges .= '<option value="'.$arr["college_id"].'">'.$arr["college_name"].'</option>';
   }
   
   
   $getCET = mysqli_query($db, "SELECT * from cetresult where 	applicantid  ='".$_SESSION['applicantID']."'"); 
   $arrCet = mysqli_fetch_array($getCET);
   
   ?>
<link rel="stylesheet" href="assets/css/chosen.min.css">
<link rel="stylesheet" href="assets/css/apply.css">
<link rel="stylesheet" href="assets/css/table.css">
<div class="container-fluid">
   <div class="row justify-content-center">
      <div class="col-11 col-sm-10 col-md-10 col-lg-6 col-xl-5 text-center p-0 mt-3 mb-2">
         <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
            <h2 id="heading">APPLY FOR YOUR DESIRED COURSE</h2>
            <p><?php echo $fullname = $_SESSION['fname'] . ' ' . $_SESSION['lname']; ?></p>
            CET SCORE :  
            <div id='my_cet'>
               <?php echo $arrCet['cetresult']?> 
            </div>
            <form action="function/upload_req.php"  method="POST"  enctype="multipart/form-data" id="msform">
               <!-- progressbar -->
               <ul id="progressbar">
                  <li class="active" id="account"><strong>College</strong></li>
                  <li id="personal"><strong>Personal Info</strong></li>
                  <li id="payment"><strong>Requirements</strong></li>
                  <li id="confirm"><strong>Finish</strong></li>
               </ul>
               <div class="progress">
                  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
               </div>
               <br> 
               <!-- SELECT COURSE  1-->

               <fieldset>
                  <div class="form-card">
                     <div class="row">
                        <div class="col-7">
                           <h2 class="fs-title">Select College:</h2>
                        </div>
                        <div class="col-5">
                           <h2 class="steps">Step 1 - 4</h2>
                        </div>
                     </div>
                     <div class="form-group  ">
                        <div id='course_table'>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="department">SELECT COLLEGE </label>
                        <select name="college" id='college'class="form-control action college_list">
                           <option disabled="disabled" selected="selected">Select College</option>
                           <?php echo $colleges; ?>
                        </select>
                     </div>

                     <div class="form-group  ">
                        <div id='course_section'>
                        </div>
                     </div>

                  </div>
                  <input type="button" name="next" id='Next' class="next action-button" value="Next" />
               </fieldset>
               <!-- END SELECT COURSE  1-->
               <!-- PERSONAL INFORMATION -->
               <fieldset>
                  <div class="form-card">
                     <div class="row">
                        <div class="col-7">
                           <h2 class="fs-title">Personal Information:</h2>
                        </div>
                        <div class="col-5">
                           <h2 class="steps">Step 2 - 4</h2>
                        </div>
                     </div>
                     <label class="fieldlabels">First Name: *</label> 
                     <input type="text" name="fname" value='<?php echo $_SESSION['fname']?>'  readonly/> 
                     <label class="fieldlabels">Last Name: *</label> 
                     <input type="text" name="lname"  value='<?php echo $_SESSION['lname']?>' readonly /> 
                     <label class="fieldlabels">Email : *</label> 
                     <input type="text" name="email"  value='<?php echo $_SESSION['email']?>' readonly />
                     <label class="fieldlabels"> Contact No.: *</label>
                     <input type="text" name="contactno"   />
                  </div>
                  <input type="button" name="next" class="next action-button" value="Next" /> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
               </fieldset>
               <!-- END PERSONAL INFORMATION -->
               <!-- SUBMIT REQUIREMENTS -->
               <fieldset>
                  <div class="form-card">
                     <div class="row">
                        <div class="col-7">
                           <h2 class="fs-title">Requirements Upload:</h2>
                        </div>
                        <div class="col-5">
                           <h2 class="steps">Step 3 - 4</h2>
                        </div>
                     </div>
                     <label class="fieldlabels">CET </label> 
                     <input type="text" name="cetvalue" value='<?php echo $arrCet['cetresult']?>'  readonly/> 

                     <label class="fieldlabels">Attach your CET Result:</label> 
                     <input type="file" name="cetfile" id="cetfile" >

                     <label class="fieldlabels">GPA : *</label> 
                     <input type="text" name="gpavalue"  /> 


                      <label class="fieldlabels">Attach your GPA :</label> 
                      <input type="file" name="gpafile" id="gpafile" >


                      <label class="fieldlabels">Attach your Good Moral::</label> 
                      <input type="file" name="moralfile"  id="moralfile">


                  </div>
                  <button type="submit" name="next" class="next action-button" > Submit </button> <input type="button" name="previous" class="previous action-button-previous" value="Previous" />
              
                </fieldset>
               <fieldset>
                  <div class="form-card">
                     <div class="row">
                        <div class="col-7">
                           <h2 class="fs-title">Finish:</h2>
                        </div>
                        <div class="col-5">
                           <h2 class="steps">Step 4 - 4</h2>
                        </div>
                     </div>
                     <br><br>
                     <h2 class="purple-text text-center"><strong>SUCCESS !</strong></h2>
                     <br>
                     <div class="row justify-content-center"> 
                        <div class="col-3"> <img src="https://i.imgur.com/GwStPmg.png" class="fit-image"> </div>
                     </div>
                     <br><br>
                     <div class="row justify-content-center">
                        <div class="col-7 text-center">
                           <h5 class="purple-text text-center">Applicantion Sent successfully </h5>
                        </div>
                     </div>
                  </div>
               </fieldset>
               <!-- END SUBMIT REQUIREMENTS -->
            </form>
         </div>
      </div>
   </div>
</div>
<script src="assets/js/apply.js"></script>
<script src="assets/js/chosen.jquery.js"></script>
<script src="assets/js/chosen.jquery.min.js"></script>
<script src="assets/js/sweetalert2.all.min.js"></script> 

<?php  include('function/academic_checker.php');?>
<script>
   $(".college_list").chosen({no_results_text: "Oops, nothing found!"});
   
</script>
<script type="text/javascript">
   $(document).ready(function(){
   // Country dependent ajax
   $("#college").on("change",function(){
   var collegeId = $(this).val();
   
    $.ajax({
    	url :"fetchCourse.php",
   type:"POST",
   cache:false,
   data:{collegeId:collegeId},
   cache: false,
   success: function(course)
   {
   $("#course_section").html(course);
   } 
   });
   
   });
   });

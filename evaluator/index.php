<?php
include('include/header.php');

    
$pending = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where college_id ='$college_id' and academic_id ='$academic_id' and userStatus='PENDING' "); 
$p_counter = mysqli_fetch_array($pending);

$rejected = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where college_id ='$college_id' and academic_id ='$academic_id' and userStatus='REJECTED' "); 
$r_counter = mysqli_fetch_array($rejected);

$prequalified = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where college_id ='$college_id' and academic_id ='$academic_id' and userStatus='PREQUALIFIED' "); 
$pre_counter = mysqli_fetch_array($prequalified);
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
                <h3>APPLICANTS LIST</h3>
            </li>
            <li>
                <a href="index.php" class="active">
                    <i class="fa fa-list" aria-hidden="true"><span>Applications</span></i>
                </a>
            </li>
            <li>
                <a href="prequalified.php">
                    <i class="fa fa-list" aria-hidden="true"><span>Prequalified</span></i>
                </a>
            </li>
            <li>
                <a href="rejected.php">
                    <i class="fa fa-thumbs-o-down" aria-hidden="true"><span>Rejected</span></i>
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
        <h2><?php echo $college ?> </h2> <br>


    </section>
    <h3 class="section-name">Applications List</h3>
    <section class="grid">

      
    <div class="row">
    <div class="col-sm-3 offset-sm-0">
       <div class="stat-card">
          <div class="stat-card__content">
             <p class="text-uppercase mb-1 text-muted">Pending Application </p>
             <h2 ><i class="text-danger font-weight-bold mr-1"></i>
                    <?php echo    $p_counter[0] ?> </h2>
         
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
             <p class="text-uppercase mb-1 text-muted">Rejected</p>
             <h2> <?php echo    $r_counter[0] ?> </h2>

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
             <p class="text-uppercase mb-1 text-muted">Pre-Qualified</p>
             <h2><?php echo $pre_counter[0] ?></h2>
            
          </div>
          <div class="stat-card__icon stat-card__icon--primary">
             <div class="stat-card__icon-circle">
                <i class="fa fa-credit-card"></i>
             </div>
          </div>
       </div>
    </div>


 </div>   


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
                
                </div>
            </div>
        </div>
        <article>
            <div
                class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mx-3 my-3">
                <table class="table table-sm table-striped table-bordered table-hover" id="printable-table">
                    <thead class="thead">
                        <?php $results = mysqli_query($db, "SELECT * from selectedcourse LEFT JOIN users ON selectedcourse.user_id = users.id
                     LEFT JOIN coursestbl ON selectedcourse.course_id = coursestbl.course_id
                     LEFT JOIN college ON selectedcourse.college_id = college.college_id
                     LEFT JOIN attachment ON selectedcourse.file_id = attachment.id WHERE userStatus='PENDING'
                     AND  college_name = '$college' ") ?>
                        <tr>

                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Course</th>
                            <th>Student Type</th>
                            <th>Cet</th>
                            <th>Gpa</th>
                            <th>action</th>

                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>

                            <td style="display:none"><?php echo $row['selectedCourse_id']; ?> </td>
                            <td><?php echo $row['fname']; ?> </td>
                            <td><?php echo $row['lname']; ?> </td>
                            <td><?php echo $row['course_name']; ?></td>
                            <td><?php echo $row['studentType']; ?></td>
                            <td><?php echo $row['cetValue']; ?></td>
                            <td><?php echo $row['gpaValue']; ?></td>
                            <td style="display:none"><?php echo $row['email']; ?></td>
                            <td style="display:none"><?php echo $row['contactNo']; ?></td>
                            <td style="display:none"><?php echo $row['img']; ?></td>
                            <td style="display:none"><?php echo $row['address']; ?></td>
                            <td style="display:none"><?php echo $row['applicantid']; ?></td>
                            <td style="display:none"><?php echo $row['cet_path']; ?></td>
                            <td style="display:none"><?php echo $row['gpa_path']; ?></td>
                            <td style="display:none"><?php echo $row['gmoral_path']; ?></td>

                            <td>

                                <button type="submit" name="" class="btn btn-success profileShow">Approve</button>
                                <button type="submit" name="" class="btn btn-danger reject">Reject</button>
                            </td>
                            <!-- <td><input type="number" name="score" class="form-control scoreInput"></td> -->

                            <!-- data-toggle="modal" data-target="#selectAction" -->
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

<?php include('modal/modal.php') ?>





<script>
//TRANSFER DATA FROM TABLE TO MODAL
$(document).ready(function() {
    $('.profileShow').on('click', function() {


        $('#profile').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        $('#id').val(data[0]);
        $('#fname').val(data[1]);
        $('#lname').val(data[2]);
        $('#course').val(data[3]);
        $('#type').val(data[4]);
        $('#cet').val(data[5]);
        $('#gpa').val(data[6]);

        $('#email').val(data[7]);
        $('#contactNo').val(data[8]);


        $('#img').val(data[9]);
        document.getElementById('mypic').innerHTML =
            '<img src="../files_upload/profile_pic/avatar.png" alt="..." class="img img-fluid" width="180" >'

        $('#address').val(data[10]);
        $('#applicantid').val(data[11]);


        document.getElementById('cet_path').innerHTML = '<a href="../files_upload/attachment/' + data[
                12] + '" target="_blank" style="color:red;text-decoration: underline;" >' + data[12] +
            ' </a> ';
        document.getElementById('gpa_path').innerHTML = '<a href="../files_upload/attachment/' + data[
                13] + '" target="_blank"  style="color:red;text-decoration: underline;"  >' + data[13] +
            ' </a> ';
        document.getElementById('gmoral_path').innerHTML = '<a href="../files_upload/attachment/' +
            data[14] + '" target="_blank"  style="color:red;text-decoration: underline;" >' + data[14] +
            ' </a> ';


    });

});
</script>



<script>
//TRANSFER DATA FROM TABLE TO MODAL
$(document).ready(function() {
    $('.reject').on('click', function() {


        $('#rejectStudent').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        $('#id1').val(data[0]);
        $('#fname1').val(data[1]);
        $('#lname1').val(data[2]);
        $('#course1').val(data[3]);
        $('#type1').val(data[4]);
        $('#cet1').val(data[5]);
        $('#gpa1').val(data[6]);

        $('#email1').val(data[7]);
        $('#contactNo1').val(data[8]);

        document.getElementById('cet_path1').innerHTML = '<a href="../files_upload/attachment/' + data[
                12] + '" target="_blank" style="color:red;text-decoration: underline;" >' + data[12] +
            ' </a> ';
        document.getElementById('gpa_path1').innerHTML = '<a href="../files_upload/attachment/' + data[
                13] + '" target="_blank"  style="color:red;text-decoration: underline;"  >' + data[13] +
            ' </a> ';
        document.getElementById('gmoral_path1').innerHTML = '<a href="../files_upload/attachment/' +
            data[14] + '" target="_blank"  style="color:red;text-decoration: underline;" >' + data[14] +
            ' </a> ';

    });

});
</script>
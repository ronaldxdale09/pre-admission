<?php
include('include/header.php');
 
    
$prequalified = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where college_id ='$college_id' and academic_id ='$academic_id' and userStatus='PREQUALIFIED' "); 
$p_counter = mysqli_fetch_array($prequalified);

$interview = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where college_id ='$college_id' and academic_id ='$academic_id' and userStatus='INTERVIEW' "); 
$i_counter = mysqli_fetch_array($interview);

$waiting = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where college_id ='$college_id' and academic_id ='$academic_id' and userStatus='WAITING' "); 
$w_counter = mysqli_fetch_array($waiting);
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
                <h3>Prequalified List</h3>
            </li>
            <li>
                <a href="index.php" class="active">
                    <i class="fa fa-list" aria-hidden="true"><span>PREQUALIFIED</span></i>
                </a>
            </li>
            <li>
                <a href="interview.php">
                    <i class="fa fa-list" aria-hidden="true"><span>INTERVIEW</span></i>
                </a>
            </li>

            <li>
                <a href="qualified.php" >
                    <i class="fa fa-list" aria-hidden="true"><span>QUALIFIED</span></i>
                </a>
            </li>

            <li>
                <a href="waiting.php" >
                    <i class="fa fa-list" aria-hidden="true"><span>WAITING</span></i>
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
        <h2>Interview | <?php echo $college ?></h2> <br>


    </section>
    <h3 class="section-name">Prequalified List</h3>
    <section class="grid">


    
    <div class="row">
    <div class="col-sm-3 offset-sm-0">
       <div class="stat-card">
          <div class="stat-card__content">
             <p class="text-uppercase mb-1 text-muted">Prequalified Application </p>
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
             <p class="text-uppercase mb-1 text-muted">Waiting for Interview</p>
             <h2> <?php echo    $i_counter[0] ?> </h2>

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


        <div class="row">
            <div class="col">
                <div class="form-group">

                </div>
            </div>
            <div class="col">
                <div class="form-group">

                </div>
            </div>
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
        </div>
        <!--END  -->
        <article>
            <div
                class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mx-3 my-3">
                <table class="table table-sm table-striped table-bordered table-hover" id="prequalified_student">
                    <thead class="thead">
                        <?php $results = mysqli_query($db, "SELECT * from selectedcourse LEFT JOIN users ON selectedcourse.user_id = users.id
                     LEFT JOIN coursestbl ON selectedcourse.course_id = coursestbl.course_id
                     LEFT JOIN college ON selectedcourse.college_id = college.college_id
                     LEFT JOIN attachment ON selectedcourse.file_id = attachment.id WHERE userStatus='PREQUALIFIED'
                     AND  college_name = '$college' AND  inter_score IS NULL ") ?>
                        <tr>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th hidden></th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Course</th>
                            <th>Student Type</th>
                            <th>Cet</th>
                            <th>Gpa</th>
                            <th>Action</th>
                        </tr>

                        <th hidden></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th hidden></th>
                        <th></th>

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
                             <button type="submit" name="" class="btn btn-success scheduleBtn">Assign</button>
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


<?php
include('include/jquery.php');

?>




<script type="text/javascript">
$(document).ready(function() {
    // Country dependent ajax
    $("#course").on("change", function() {
        var courseId = $(this).val();

        $.ajax({
            url: "modal/fetchInterviewer.php",
            type: "POST",
            cache: false,
            data: {
                courseId: courseId
            },
            cache: false,
            success: function(course) {
                $("#interviewer_section").html(course);
            }
        });

    });
});
</script>





<script>
$(document).ready(function() {
    // Create date inputs

    // DataTables initialisation
    var table = $('#prequalified_student').DataTable({
        "ordering": false,

        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print',



        ],
        initComplete: function() {
            this.api().columns([3]).every(function() {
                var column = this;
                var select = $(
                        ' <select  class="form-control action" required> <option value="">All</option></select>'
                    )
                    .appendTo($(column.header()))
                    .on('change', function() {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );

                        column
                            .search(val ? '^' + val + '$' : '', true, false)
                            .draw();
                    });

                column.data().unique().sort().each(function(d, j) {
                    select.append('<option value="' + d + '">' + d + '</option>')
                });
            });
        }



    });

});
</script>


<script>
//TRANSFER DATA FROM TABLE TO MODAL
$(document).ready(function() {
    $('.scheduleBtn').on('click', function() {


        $('#schedule').modal('show');
        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();
        $('#id2').val(data[0]);
        $('#fname1').val(data[1]);
        $('#lname1').val(data[2]);




    });

});
</script>
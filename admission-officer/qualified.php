<?php
include('include/header.php');


if (isset($_GET['course'])) {
    $course_id = $_GET['course'];
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
                <h3>Prequalified List</h3>
            </li>
            <li>
                <a href="index.php">
                    <i class="fa fa-list" aria-hidden="true"><span>Home</span></i>
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
    <h3 class="section-name">Qualified Student</h3>
    <section class="grid">
            <div class="row">
            <div class="col">
              
                </div>
            </div>
            <div class="col">
                <div class="form-group">

                </div>
            </div>
            <div class="col">
                <div class="form-group">
                <div class="form-group">
                <h6 style='margin-bottom:0px;'>
                        Current Active Admission Schedule: <?php
                            $record = mysqli_query($db, "SELECT * FROM admissionbatch WHERE is_active=1");
                            $admission=mysqli_fetch_array($record);
                            if(isset($admission)){
                                echo date('M d',strtotime($admission['start_date']))." to ".date('M d',strtotime($admission['end_date'])).", S.Y. ".$admission['schoolyear'];
                            }
                        ?>
                    </h6>
            
                </div>
            </div>
        </div>
        <article>
            <div
                class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mx-3 my-3">
                <table class="table table-sm table-striped table-bordered table-hover" id="interview_table">
                    <thead class="thead">
                        <?php $results = mysqli_query($db, "SELECT * from selectedcourse LEFT JOIN users ON selectedcourse.user_id = users.id
                    LEFT JOIN attachment ON selectedcourse.file_id = attachment.id
                     LEFT JOIN coursestbl ON selectedcourse.course_id = coursestbl.course_id
                     LEFT JOIN schedule_interview ON selectedcourse.interview_sched = schedule_interview.schedule_interview_id
                      WHERE userStatus='QUALIFIED' AND  selectedcourse.course_id = '$course_id'") ?>
                        <tr>
                            <th hidden></th>
                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Course</th>
                            <th>Cet</th>
                            <th>Gpa</th>
                            <th>Interview Score</th>
                        </tr>

                    </thead>
                    <tbody class="tbody">
                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>

                            <td style="display:none"><?php echo $row['selectedCourse_id']; ?> </td>
                            <td><?php echo $row['fname']; ?> </td>
                            <td><?php echo $row['lname']; ?> </td>
                            <td><?php echo $row['course_name']; ?></td>
                            <td><?php echo $row['cetValue']; ?></td>
                            <td><?php echo $row['gpaValue']; ?></td>
                            <td><?php echo $row['inter_score']; ?></td>
                 

                
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

<?php include('modal/modal.php');
include('include/jquery.php');
 ?>








<script>
$(document).ready(function() {
    // Create date inputs

    // DataTables initialisation
    var table = $('#interview_table').DataTable({
        "ordering": false,

        dom: 'Bfrtip',
        buttons: [
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print',



        ]



    });

});
</script>
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
                <h3>CANCELLED LIST</h3>
            </li>
            <li>
                <a href="index.php">
                    <i class="fa fa-list" aria-hidden="true"><span>Applications</span></i>
                </a>
            </li>
            <li>
                <a href="prequalified.php"  >
                    <i class="fa fa-list" aria-hidden="true"><span>Prequalified</span></i>
                </a>
            </li>
            <li>
                <a href="rejected.php">
                    <i class="fa fa-thumbs-o-down" aria-hidden="true"><span>Rejected</span></i>
                </a>
            </li>
            <li>
                <a href="#" class="active">
                    <i class="fa fa-ban" aria-hidden="true"><span>Cancelled</span></i>
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
    <h3 class="section-name">CANCELLED LIST</h3>
    <section class="grid">
        <article>
            <div
                class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mx-3 my-3">
                <table class="table table-sm table-striped table-bordered table-hover" id="printable-table">
                    <thead class="thead">
                        <?php $results = mysqli_query($db, "SELECT * from selectedcourse LEFT JOIN users ON selectedcourse.user_id = users.id
                     LEFT JOIN coursestbl ON selectedcourse.course_id = coursestbl.course_id
                     LEFT JOIN college ON selectedcourse.college_id = college.college_id
                     LEFT JOIN attachment ON selectedcourse.file_id = attachment.id WHERE userStatus='CANCELLED'
                     AND  college_name = '$college' ") ?>
                        <tr>

                            <th>FirstName</th>
                            <th>LastName</th>
                            <th>Course</th>
                            <th>Student Type</th>
                            <th>Cet</th>
                            <th>Gpa</th>

                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>

                            <td style="display:none"><?php echo $row['user_id']; ?> </td>
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
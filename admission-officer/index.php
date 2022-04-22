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
                <h3><?php echo $college ?></h3>
            </li>
            <li>
                <a href="index.php" class="active">
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
        <h2>Admission Officer | <?php echo $college ?></h2> <br>


    </section>

    <section class="grid">

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
                        <?php $results = mysqli_query($db, "SELECT * from coursestbl WHERE college_id ='".$row['college_id']."'") ?>
                        <tr>
                            <th>ID</th>
                            <th> Img </th>
                            <th>Course</th>
                            <th>Slots</th>
                            <th>CET REQUIREMENTS</th>
                            <th>GPA REQUIREMENTS</th>
                            <th>Action</th>

                        </tr>


                    </thead>
                    <tbody class="tbody">
                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr>

                            <td><?php echo $row['course_id']; ?> </td>
                            <td>
                                <nobr> <img src="../collegeimg/<?php echo $row['course_img'];?>" alt="..."
                                        class="img img-fluid" width="40"></nobr>
                            </td>
                            <td><?php echo $row['course_name']; ?> </td>
                            <td><?php echo $row['quota']; ?> </td>
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
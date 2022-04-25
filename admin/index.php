<?php
include('include/header.php');
 
?>

<?php if (isset($_SESSION['email'])) : ?>
<header class="page-header">
    <?php include('include/navbar.php'); ?>
</header>


<?php endif ?>
<section class="page-content">
    <section class="btn-group">
        <h2>System Administrator</h2> <br>
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
                        <?php $results = mysqli_query($db, "SELECT * from coursestbl") ?>
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
<?php
include('include/header.php');
 
?>

<?php if (isset($_SESSION['email'])) : ?>
<header class="page-header">
<?php
include('include/navbar.php');
 
?>
</header>


<?php endif ?>
<section class="page-content">
    <section class="grid">
        <article>
            <div class="table table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl mx-3 my-3">
                <div style='padding:10px;'> 
                    <h2 style='margin-bottom:10px;'>System Administrator</h2>
                    <h5 style='margin-bottom:20px;'>
                        College Management
                    </h5>
                    <button class='btn btn-success open-modal'>Add New College</button>
                    <hr>
                    <h5>Select a College</h5>
                </div>
                <table class="table table-sm table-striped table-bordered table-hover" id="list_course">
                    <thead class="thead">
                        <?php $results = mysqli_query($db, "SELECT * from college") ?>
                        <tr>
                            <th>ID</th>
                            <th>College Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody class="tbody">
                        <?php while ($row = mysqli_fetch_array($results)) { ?>
                        <tr class='trow' id='<?php echo $row['college_id']; ?>'>
                            <td><?php echo $row['college_id']; ?> </td>
                            <td><nobr style='margin-right:10px;'> <img src="../collegeimg/<?php echo $row['college_img'];?>" alt="..." class="img img-fluid" width="40"></nobr><?php echo $row['college_name']; ?> </td>
                            <td><?php echo $row['college_description']; ?> </td>

                        </tr>
                        <?php
                            }
                            ?>
                    </tbody>
                </table>


        </article>
    </section>
</section>
<div class="modal" name='0' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
    <form class="modal-container" method="post" method="post" action="function/insert_college.php">
        <h4 style='margin-bottom:20px;'>Add a New Course</h4>
        <div class="container">
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>College Name</h5>
                </div>
                <input type='text' name='name' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'>
            </div>
            <div class="row" style='margin-bottom:15px; display:none;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Add Course Image</h5> <!-- NOT WORKING -->
                </div>
                <input type='file' accept="image/png, image/jpeg" class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>College Description</h5>
                </div>
                <textarea type='textbox' name='description' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'></textarea>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-success' style='margin-left:20px;flex:1;' value='Add'></div>
            </div>
        </div>
    </form>
</div>
<div class="modal" name='0' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
    <form class="modal-container" method="post" method="post" action="function/insert_college.php">
        <h4 style='margin-bottom:20px;'>Add a New Course</h4>
        <div class="container">
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>College Name</h5>
                </div>
                <input type='text' name='name' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'>
            </div>
            <div class="row" style='margin-bottom:15px; display:none;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Add Course Image</h5> <!-- NOT WORKING -->
                </div>
                <input type='file' accept="image/png, image/jpeg" class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>College Description</h5>
                </div>
                <textarea type='textbox' name='description' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'></textarea>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-success' style='margin-left:20px;flex:1;' value='Add'></div>
            </div>
        </div>
    </form>
</div>
</body>
<?php include('include/jquery.php'); ?>
<script src="assets/js/modal.js"></script>
<script>

$(document).on('click', '.trow', function() {
    var id = $(this).attr('id');
    window.location.href = "course.php?college="+id;
});

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
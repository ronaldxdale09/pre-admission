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
                    <?php 
                        $college_id = $_REQUEST['college'];
                        $record = mysqli_query($db,"SELECT * FROM college WHERE college_id=$college_id");
                        $college=mysqli_fetch_array($record);
                    ?>
                    <h5 style='margin-bottom:0px;'>
                        <nobr style='margin-right:10px;'> <img src="../collegeimg/<?php echo $college['college_img']; ?>" alt="..." class="img img-fluid" width="60"></nobr>
                        <?php echo $college['college_id']." | ".$college['college_name']; ?>
                    </h5>
                    <h5 style='margin-left:95; margin-bottom:10;'>
                        <?php echo $college['college_description']; ?>
                    </h5>
                    <hr>
                    <div style='margin:0; padding:0;'>
                        <button class='btn btn-primary open-college-modal'>Manage College</button>
                        <button class='btn btn-success open-modal'>Add New Course</button>
                    </div>
                </div>
                <div style='padding:10px;'>
                    <table class="table table-sm table-striped table-bordered table-hover" id="list_course">
                        <thead class="thead">
                            <?php 
                                $results = mysqli_query($db, "SELECT * from coursestbl WHERE college_id=$college_id");
                            ?>
                            <tr>
                                <th style='width:10%;'>ID</th>
                                <th style='width:40%;'>Course Name</th>
                                <th style='width:50%;'>Description</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php 
                                while ($row = mysqli_fetch_array($results)) { 
                            ?>
                                <tr class='trow' id='<?php echo $row['course_id']; ?>'>
                                    <td style='width:10%;' id='course-id-<?php echo $row['course_id']; ?>'><?php echo $row['course_id']; ?> </td>
                                    <td style='width:40%;' id='course-name-<?php echo $row['course_id']; ?>'><nobr style='margin-right:10px;'> <img src="../collegeimg/<?php echo $row['course_img'];?>" alt="..." class="img img-fluid" width="40"></nobr><?php echo $row['course_name']; ?> </td>
                                    <td style='width:50%;position:relative;' id='course-description-<?php echo $row['course_id']; ?>'><?php echo $row['course_description']; ?> 
                                        <div class='trow-btn-container'>
                                            <button class="btn btn-primary trow-btn open-course-modal" style='margin-right:5px' name='<?php echo $row['course_id']; ?>'><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger trow-btn open-delete-modal" name='<?php echo $row['course_id']; ?>'><i class="fa-solid fa-trash-can"></i></button>
                                        </div>
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
<div class="modal" name='0' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
    <form class="modal-container" method="post" action="function/insert_course.php">
        <h4 style='margin-bottom:20px;'>Add a New Course</h4>
        <div class="container">
            <input type='hidden' name='college_id' value='<?php echo $college['college_id']; ?>'>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Course Name</h5>
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
                    <h5>Course Description</h5>
                </div>
                <textarea type='textbox' name='description' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'></textarea>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-success' style='margin-left:20px;flex:1;' value='Add'></div>
            </div>
        </div>
    </form>
</div>
<div class="modal" name='1' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
    <form class="modal-container" action="function/update_college.php">
        <h4 style='margin-bottom:20px;'>Edit College Details</h4>
        <div class="container">
            <input type='hidden' name='college_id' value='<?php echo $college['college_id']; ?>'>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>College Name</h5>
                </div>
                <input type='text' id='edit-college-name' name='name' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' value='<?php echo $college['college_name']; ?>'>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>College Description</h5>
                </div>
                <textarea type='textbox' id='edit-college-description' name='description' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'><?php echo $college['college_description']; ?></textarea>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-college-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-primary' style='margin-left:20px;flex:1;' value='Update'></div>
            </div>
        </div>
    </form>
</div>
<div class="modal" name='2' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
    <form class="modal-container" method="post" action="function/update_course.php">
        <h4 style='margin-bottom:20px;'>Edit Course Details</h4>
        <div class="container">
            <input type='hidden' name='college_id' value='<?php echo $college['college_id']; ?>'>
            <input type='hidden' id='edit-course-id' name='course_id' value=''>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Course Name</h5>
                </div>
                <input type='text' id='edit-course-name' name='name' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Course Description</h5>
                </div>
                <textarea type='textbox' id='edit-course-description' name='description' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'></textarea>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-course-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-primary' style='margin-left:20px;flex:1;' value='Update'></div>
            </div>
        </div>
    </form>
</div>
<div class="modal" name='3' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
    <form class="modal-container" method="post" action="function/delete_course.php">
        <h4 style='margin-bottom:10px; color:red;'>This Will Delete the Course!</h4>
        <h5 style='margin-bottom:20px; color:red;'>Are you sure you want to delete this course?</h5>
        <div class="container">
            <input type='hidden' name='college_id' value='<?php echo $college['college_id']; ?>'>
            <input type='hidden' id='delete-course-id' name='course_id' value=''>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h6>Course Name</h6>
                </div>
                <h5 id='delete-course-name' name='name' class='col-md-10 offset-md-1 p-0'></h5>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-delete-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-danger' style='margin-left:20px;flex:1;' value='Delete'></div>
            </div>
        </div>
    </form>
</div>
</body>


<?php
    include('include/jquery.php');
?>
<script src="assets/js/modal.js"></script>
<script>

    
$(document).on('click', '.open-college-modal', function() {
    openModal(1);
    return 0;
});

$(document).on('click', '.close-college-modal', function() {
    closeModal(1);
    return 0;
});
    
$(document).on('click', '.open-course-modal', function() {
    document.getElementById('edit-course-id').value = $(this).attr('name');
    document.getElementById('edit-course-name').value = document.getElementById('course-name-'+$(this).attr('name')).innerText;
    document.getElementById('edit-course-description').innerText = document.getElementById('course-description-'+$(this).attr('name')).innerText;
    openModal(2);
    return 0;
});

$(document).on('click', '.close-course-modal', function() {
    closeModal(2);
    return 0;
});
    
$(document).on('click', '.open-delete-modal', function() {
    console.log('delete!');
    document.getElementById('delete-course-id').value = $(this).attr('name');
    document.getElementById('delete-course-name').innerText = document.getElementById('course-name-'+$(this).attr('name')).innerText
    openModal(3);
    return 0;
});

$(document).on('click', '.close-delete-modal', function() {
    closeModal(3);
    return 0;
});

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
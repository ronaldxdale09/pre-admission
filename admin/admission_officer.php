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
                    <h5 style='margin-bottom:0px;'>
                        Admissions Officer Management
                    </h5>
                    <h6 style='margin-bottom:0px;'>
                        Current Active Admission Schedule: <?php
                            $record = mysqli_query($db, "SELECT * FROM admissionbatch WHERE is_active=1");
                            $admission=mysqli_fetch_array($record);
                            if(isset($admission)){
                                echo date('M d',strtotime($admission['start_date']))." to ".date('M d',strtotime($admission['end_date'])).", S.Y. ".$admission['schoolyear'];
                            }
                        ?>
                    </h6>
                    <hr>
                    <div style='margin:0; padding:0;'>
                        <button class='btn btn-success open-modal' style='margin-right:10px;'>Add New Officer</button>
                        <button class='btn btn-primary open-schedule-modal'>Create New Admission Schedule</button>
                    </div>
                </div>
                <div style='padding:10px;'>
                    <table class="table table-sm table-striped table-bordered table-hover" id="list_course">
                        <thead class="thead">
                            <?php 
                                $results = mysqli_query($db, "SELECT * FROM admission_officer INNER JOIN users INNER JOIN college WHERE admission_officer.user_id = users.id AND admission_officer.college_id = college.college_id");
                            ?>
                            <tr>
                                <th style='width:10%;'>ID</th>
                                <th style='width:40%;'>Name</th>
                                <th style='width:50%;'>College</th>
                            </tr>
                        </thead>
                        <tbody class="tbody">
                            <?php 
                                while ($row = mysqli_fetch_array($results)) { 
                            ?>
                                <tr class='trow' id='<?php echo $row['ao_id']; ?>'>
                                    <td style='width:10%;' id='course-id-<?php echo $row['ao_id']; ?>'>
                                        <?php echo $row['ao_id']; ?> 
                                    </td>
                                    <td style='width:40%;' id='course-name-<?php echo $row['ao_id']; ?>'>
                                    <?php echo $row['fname']." ".$row['lname']; ?> 
                                    </td>
                                    <td style='width:50%;position:relative;' id='course-description-<?php echo $row['ao_id']; ?>'><?php echo $row['college_name']; ?> 
                                        <div class='trow-btn-container'>
                                            <button class="btn btn-primary trow-btn open-edit-modal" style='margin-right:5px' name='<?php echo $row['ao_id']; ?>'><i class="fa-solid fa-pen-to-square"></i></button>
                                            <button class="btn btn-danger trow-btn open-delete-modal" name='<?php echo $row['ao_id']; ?>'><i class="fa-solid fa-trash-can"></i></button>
                                        </div>
                                        <div id="hidden-inputs" style='display:none;'>
                                            <input type="text" id='user-<?php echo $row['ao_id']; ?>' value='<?php echo $row['id']; ?>'>
                                            <input type="text" id='fname-<?php echo $row['ao_id']; ?>' value='<?php echo $row['fname']; ?>'>
                                            <input type="text" id='lname-<?php echo $row['ao_id']; ?>' value='<?php echo $row['lname']; ?>'>
                                            <input type="text" id='email-<?php echo $row['ao_id']; ?>' value='<?php echo $row['email']; ?>'>
                                            <input type="text" id='contactno-<?php echo $row['ao_id']; ?>' value='<?php echo $row['contactNo']; ?>'>
                                            <input type="text" id='address-<?php echo $row['ao_id']; ?>' value='<?php echo $row['address']; ?>'>
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
    <form class="modal-container" method="post" action="function/insert_officer.php">
        <h4 style='margin-bottom:20px;'>Add New Officer</h4>
        <div class="container">
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Firstname</h5>
                </div>
                <input type='text' name='firstname' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Lastname</h5>
                </div>
                <input type='text' name='lastname' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Email</h5>
                </div>
                <input type='text' name='email' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Contact No</h5>
                </div>
                <input type='text' name='contactno' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Address</h5>
                </div>
                <input type='text' name='address' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Select College</h5>
                </div>
                <select name="college" class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
                    <option value=''>-----</option>
                    <?php
                        $colleges = mysqli_query($db, "SELECT * FROM college");
                        while ($college = mysqli_fetch_array($colleges)) { 
                    ?>
                    <option value='<?php echo $college['college_id']; ?>'><?php echo $college['college_name']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-success' style='margin-left:20px;flex:1;' value='Add'></div>
            </div>
        </div>
    </form>
</div>
<div class="modal" name='1' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
    <form class="modal-container" method="post" action="function/update_officer.php">
        <h4 style='margin-bottom:20px;'>Edit Officer Info</h4>
        <div class="container">
            <input type='hidden' id='edit-user-id' name='user_id'>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Firstname</h5>
                </div>
                <input type='text' id='edit-fname' name='firstname' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Lastname</h5>
                </div>
                <input type='text' id='edit-lname' name='lastname' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Email</h5>
                </div>
                <input type='text' id='edit-email' name='email' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Contact No</h5>
                </div>
                <input type='text' id='edit-contactno' name='contactno' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Address</h5>
                </div>
                <input type='text' id='edit-address' name='address' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' required>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5 style='display:flex; align-items:center;'><input type='checkbox' name='password-checkbox' style='border:solid black 1px; margin-right:10px;'> Reset Password</h5>
                </div>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-edit-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-primary' style='margin-left:20px;flex:1;' value='Update'></div>
            </div>
        </div>
    </form>
</div>
<div class="modal" name='2' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
    <form class="modal-container" method="post" action="function/delete_officer.php">
        <h4 style='margin-bottom:10px; color:red;'>This Will Delete the User!</h4>
        <h5 style='margin-bottom:20px; color:red;'>Are you sure you want to delete this user?</h5>
        <div class="container">
            <input type='hidden' id='delete-user-id' name='user_id'>
            <input type='hidden' id='delete-ao-id' name='ao_id'>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h6>User Name</h6>
                </div>
                <h5 id='delete-user-name' name='name' class='col-md-10 offset-md-1 p-0'></h5>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-delete-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-danger' style='margin-left:20px;flex:1;' value='Delete'></div>
            </div>
        </div>
    </form>
</div>
<div class="modal" name='3' style='background-color:rgba(0, 0, 0, 0.37); display:block; height:0px; width:0px;'>
    <form class="modal-container" method="post" action="function/insert_admissionbatch.php">
        <h4 style='margin-bottom:20px;'>Create Admission Schedule</h4>
        <div class="container">
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>Start Date</h5>
                </div>
                <input type='date' id='date-start' name='start-date' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' onchange='validateDate()'>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>End Date</h5>
                </div>
                <input type='date' id='date-end' name='end-date' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;' onchange='validateDate()'>
            </div>
            <div class="row" style='margin-bottom:15px;'>
                <div class="col-md-10 offset-md-1 p-0">
                    <h5>School Year</h5>
                </div>
                <select name='schoolyear' class='col-md-10 offset-md-1' style='border:solid black 1px; padding:2 5 2 5;'>
                    <option value=''>------</option>
                    <?php
                        $curYear = date("Y");
                        #date('Y', strtotime(' + 5 years'));
                        for($i = 0; $i <= 2; $i++){
                            ?>
                            <option value='<?php echo date("Y",strtotime($curYear." + ".$i." years"))."-".date("Y",strtotime($curYear." + ".($i+1)." years")); ?>'><?php echo date("Y",strtotime($curYear." + ".$i." years"))."-".date("Y",strtotime($curYear." + ".($i+1)." years")); ?></option>
                            <?php
                        }
                    ?>
                </select>
            </div>
            <div class="row">
                <div class='col-md-10 offset-md-1 p-0' style='display:flex; margin-top:20px;'><button type='button' class='btn btn-secondary close-schedule-modal' style='flex:0.8;'>Cancel</button><input type='submit' class='btn btn-primary' style='margin-left:20px;flex:1;' value='Update'></div>
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
    
$(document).on('click', '.open-edit-modal', function() {
    document.getElementById('edit-user-id').value = document.getElementById('user-'+$(this).attr('name')).value;
    document.getElementById('edit-fname').value = document.getElementById('fname-'+$(this).attr('name')).value;
    document.getElementById('edit-lname').value = document.getElementById('lname-'+$(this).attr('name')).value;
    document.getElementById('edit-email').value = document.getElementById('email-'+$(this).attr('name')).value;
    document.getElementById('edit-contactno').value = document.getElementById('contactno-'+$(this).attr('name')).value;
    document.getElementById('edit-address').value = document.getElementById('address-'+$(this).attr('name')).value;
    openModal(1);
    return 0;
});

$(document).on('click', '.close-edit-modal', function() {
    closeModal(1);
    return 0;
});
    
$(document).on('click', '.open-delete-modal', function() {
    document.getElementById('delete-user-id').value = document.getElementById('user-'+$(this).attr('name')).value;
    document.getElementById('delete-ao-id').value = $(this).attr('name');
    document.getElementById('delete-user-name').innerText = document.getElementById('fname-'+$(this).attr('name')).value + " " + document.getElementById('lname-'+$(this).attr('name')).value;
    openModal(2);
    return 0;
});

$(document).on('click', '.close-delete-modal', function() {
    closeModal(2);
    return 0;
});

$(document).on('click', '.open-schedule-modal', function() {
    openModal(3);
    return 0;
});

$(document).on('click', '.close-schedule-modal', function() {
    closeModal(3);
    return 0;
});

function validateDate(){
    date_start = document.getElementById('date-start');
    date_end = document.getElementById('date-end');
    console.log('validate');
    if(date_start.value != '' && date_end.value != ''){
        if(date_start.value>date_end.value){
            alert('Date End cannot be before Date Start!');
            date_end.value = '';
            return false;
        }
        else{
            return true;
        }
    }
};

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
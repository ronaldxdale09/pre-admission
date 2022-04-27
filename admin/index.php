<?php
include('include/header.php');
$record = mysqli_query($db, "SELECT * FROM admissionbatch WHERE is_active=1");
$admission=mysqli_fetch_array($record);
$academic_id =  $admission['admission_id'];
 
?>

<?php if (isset($_SESSION['email'])) : ?>
<header class="page-header">
    <?php include('include/navbar.php'); ?>
    <link rel="stylesheet" href="assets/css/dashboard.css">
</header>


<?php endif ?>
<section class="page-content">
    <div class="p-1 my-container active-cont">
        <div class="center-container container" style='background-color:transparent; box-shadow:none;'>
        
        <?php 
            $query = mysqli_query($db,"SELECT * FROM admission_officer");
            $admission_officers = $query->num_rows;
            $query = mysqli_query($db,"SELECT * FROM college");
            $colleges = $query->num_rows;
            $query = mysqli_query($db,"SELECT * FROM coursestbl");
            $courses = $query->num_rows;
            // $computer=mysqli_fetch_array($record);
            // if(isset($computer)){
            //     $computer_id = $computer['id'];
            //     $lab_id = $computer['lab'];
            // }
        ?>
            <div class="row">
                <div class="col-md-6 col-lg-3 p-2">
                    <div class="dashboard-module dashboard-module-sm">
                        <div class="dashboard-label">
                            Admission Officers Registered
                        </div>
                        <div class="dashboard-value">
                            <?php echo $admission_officers; ?>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6 col-lg-3 p-2">
                    <div class="dashboard-module dashboard-module-sm">
                        <div class="dashboard-label">
                            Colleges Registered
                        </div>
                        <div class="dashboard-value">
                            <?php echo $colleges; ?>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6 col-lg-3 p-2">
                    <div class="dashboard-module dashboard-module-sm">
                        <div class="dashboard-label">
                            Courses Registered
                        </div>
                        <div class="dashboard-value">
                            <?php echo $courses; ?>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6 col-lg-3 p-2">
                    <div class="dashboard-module dashboard-module-sm">
                        <div class="dashboard-label">
                            Current Admission Schedule
                        </div>
                        <div class="dashboard-value" style='font-size:21px;'>
                            <?php 
                               
                                if(isset($admission)){
                                    echo date('M d',strtotime($admission['start_date']))." to ".date('M d',strtotime($admission['end_date']))."<br> S.Y. ".$admission['schoolyear'];
                                }
                            ?>
                        </div>
                    </div> 
                </div>
                <div class="col-md-6 col-lg-6 p-2">
                    <div class="dashboard-module dashboard-module-lg">
                        <canvas id="pie" style="max-height:100%; max-width:100%;"></canvas>
                    </div> 
                </div>
                <div class="col-md-6 col-lg-6 p-2">
                    <div class="dashboard-module dashboard-module-lg">
                        <canvas id="bar" style="max-height:100%; max-width:100%;"></canvas>
                    </div> 
                </div>
                <div class="col-md-12 col-lg-12 p-2">
                    <div class="dashboard-module dashboard-module-lg">
                        <canvas id="plots" style="width:100%;max-width:100%; max-height:100%;"></canvas>
                    </div> 
                </div>
            </div>
        </div>
    </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
        // Get the HTML canvas by its id 
        plots = document.getElementById("plots");
        pie = document.getElementById("pie");
        bar = document.getElementById("bar");

        // Example datasets for X and Y-axes 
        <?php
            $days = [];
            $sessions = [];
            $dayindex = 0;
            for($i = 0; $i < 7; $i++){
                $sessions_count = mysqli_query($db,"SELECT * FROM application_log WHERE  academic_id ='$academic_id' and date = CURDATE() - INTERVAL $dayindex DAY");
                $day = mysqli_fetch_array(mysqli_query($db,"SELECT DAYNAME(CURDATE() - INTERVAL $dayindex DAY) AS week_day"));
                $days[$i] = $day['week_day'];
                $sessions[$i] = mysqli_num_rows($sessions_count);
                $dayindex++;
            }
        ?>
        var days = [<?php for($i = 6; $i >= 0; $i--){ echo '\''.$days[$i].'\''.','; } ?>]; //Stays on the X-axis 
        var sales = [<?php for($i = 6; $i >= 0; $i--){ echo $sessions[$i].','; } ?>] //Stays on the Y-axis 

        // Create an instance of Chart object:
        new Chart(plots, {
                options: {
                    plugins:{
                        title:{
                            display:true,
                            text: 'Application Qty. for the Past Week',
                        },
                    },
                },
                type: 'line', //Declare the chart type 
                data: {
                labels: days, //X-axis data 
                datasets: [{
                    label:'Reservations',
                    data: sales, //Y-axis data 
                    backgroundColor: '#003300',
                    borderColor: 'black',
                    tension: 0.3,
                    fill: false, //Fills the curve under the line with the babckground color. It's true by default
                }]
            },
        });

        
        <?php
            $sql = mysqli_query($db,"SELECT * FROM application_log WHERE userStatus='PENDING' and academic_id ='$academic_id'");
            $duration_1=mysqli_num_rows($sql);
            $sql = mysqli_query($db,"SELECT * FROM application_log WHERE userStatus='PREQUALIFIED' and academic_id ='$academic_id'");
            $duration_2=mysqli_num_rows($sql);
            $sql = mysqli_query($db,"SELECT * FROM application_log WHERE userStatus='QUALIFIED' and academic_id ='$academic_id'");
            $duration_3=mysqli_num_rows($sql);
            $sql = mysqli_query($db,"SELECT * FROM application_log WHERE userStatus='INTERVIEW' and academic_id ='$academic_id'");
            $duration_4=mysqli_num_rows($sql);
        ?>
        new Chart(pie, {
                options: {
                    plugins:{
                        title:{
                            display:true,
                            text: 'Session Duration Distribution',
                        },
                    },
                },
                type: 'doughnut', //Declare the chart type 
                data: {
                labels: [
                    'Pending',
                    'Prequalified',
                    'Qualified',
                    'Interview',
                ],
                datasets: [{
                    label:'Carts',
                    data:[<?php echo $duration_1.",".$duration_2.",".$duration_3.",".$duration_4; ?>],
                    backgroundColor: [
                        'rgb(214, 31, 11)',
                        'rgb(191, 212, 59)',
                        'rgb(21, 232, 21)',
                        'rgb(60, 125, 22)',
                    ],
                    borderColor: 'black',
                    fill: false, //Fills the curve under the line with the babckground color. It's true by default
                }]
            },
        });
        
        
        <?php
            $college_count = [];
            $college_name = [];
            $i = 0;
            $colleges = mysqli_query($db,"SELECT * FROM college");
            while($college = mysqli_fetch_array($colleges)){
                $count = mysqli_query($db,"SELECT * FROM application_log WHERE  academic_id ='$academic_id' and college_id=".$college['college_id']);
                $college_count[$i] = mysqli_num_rows($count);
                $string = $college['college_name'];
                $expr = '/(?<=\s|^)[A-Z]/';
                preg_match_all($expr, $string, $matches);    
                $result = implode('', $matches[0]);
                $college_name[$i] = $result;
                $i++;
            }
        ?>
        new Chart(bar, {
                options: {
                    plugins:{
                        title:{
                            display:true,
                            text: 'Applicant College Distribution',
                        },
                    },
                },
                type: 'bar', //Declare the chart type 
                data: {
                labels: [<?php for($i = 0; $i < count($college_count); $i++){ echo '\''.$college_name[$i].'\','; } ?>],
                datasets: [{
                    label:'Applicants',
                    data:[<?php for($i = 0; $i < count($college_count); $i++){ echo '\''.$college_count[$i].'\''.','; } ?>],
                    backgroundColor: [
                        'rgb(125, 11, 25)',
                    ],
                    borderColor: 'black',
                    fill: false, //Fills the curve under the line with the babckground color. It's true by default
                }]
            },
        });
</script>
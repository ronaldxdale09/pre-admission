<?php 
    include('../../function/db.php');

    $output='';
    $course_id = $_POST['courseId'];
    $date = $_POST['date'];
    $output .= '
    
      <label for="sched_time">SELECT TIME </label>
    <select name="sched_time" id="sched_time" class="form-control action sched_time" required>
    <option disabled="disabled" selected="selected" required>Select schedule time</option>
    ';

    $query    = "SELECT * FROM `schedule_interview` WHERE interview_date ='$date' and course_id='$course_id'";


    $result = mysqli_query($db, $query);


  while ($row = mysqli_fetch_array($result))
  {
    $output .= '<option value="'.$row["schedule_interview_id"].'">'.$row["interview_time"].'</option>';

  } 

  $output .='</select>';
  echo $output;

?>

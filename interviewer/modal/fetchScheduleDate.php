<?php 
    include('../../function/db.php');

    $output='';
    $courseId = $_POST['courseId'];
    $output .= '
    
      <label for="sched_date">SELECT DATE </label>
    <select name="sched_date" id="sched_date" class="form-control action course_list" required>
    <option disabled="disabled" selected="selected" required>Select Date</option>
    ';

    $query    = "SELECT * FROM `schedule_interview` WHERE course_id = $courseId; ";


    $result = mysqli_query($db, $query);


  while ($row = mysqli_fetch_array($result))
  {
    $output .= '<option value="'.$row["interview_date"].'">'.$row["interview_date"].'</option>';

  } 

  $output .='</select>';
  echo $output;

?>



<script type="text/javascript">
$(document).ready(function() {
    // Country dependent ajax
    $("#sched_date").on("change", function() {
        var date = $(this).val();
        var courseId = document.getElementById("sched_course").value
        $.ajax({
            url: "modal/fetchScheduleTime.php",
            type: "POST",
            cache: false,
            data: {
                date: date,
                courseId: courseId
            },
            cache: false,
            success: function(course) {
                $("#schedule_time").html(course);
            }
        });

    });
});
</script>

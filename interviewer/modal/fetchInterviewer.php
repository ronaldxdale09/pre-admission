<?php 
    include('../../function/db.php');

    $output='';
    $courseId = $_POST['courseId'];
    $output .= '
    
      <label for="selected_interviewer">SELECT INTERVIEWER </label>
    <select name="selected_interviewer" id="selected_interviewer" class="form-control action course_list" required>
    <option disabled="disabled" selected="selected" required>Select Interviewer</option>
    ';

    $query    = "SELECT * FROM `list_interviewer` WHERE course_id = $courseId; ";


    $result = mysqli_query($db, $query);


  while ($row = mysqli_fetch_array($result))
  {
    $output .= '<option value="'.$row["ic_id"].'">'.$row["name"].'</option>';

  } 

  $output .='</select>';
  echo $output;

?>

<script>
$(".course_list").chosen({
    no_results_text: "Oops, nothing found!"
});
</script>
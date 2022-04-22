<?php 
    include('../function/db.php');

    $output='';
    $collegeId = $_POST['collegeId'];
    $output .= '
    
      <label for="course">SELECT COURSE </label>
    <select name="course" id="selected_course" class="form-control action course_list">
    <option disabled="disabled" selected="selected" required>Select Course</option>
    ';

    $query    = "SELECT * FROM `coursestbl` WHERE college_id = $collegeId; ";


    $result = mysqli_query($db, $query);


  while ($row = mysqli_fetch_array($result))
  {
    $output .= '<option value="'.$row["course_id"].'">'.$row["course_name"].'</option>';

  } 

  $output .='</select>';
  echo $output;

?>

<script>
 $(".course_list").chosen({no_results_text: "Oops, nothing found!"});

</script>



<script type="text/javascript">
   $(document).ready(function(){
   // Country dependent ajax
   $("#selected_course").on("change",function(){
   var course_id = $(this).val();
  
    $.ajax({
    	url :"fetchCourseInfo.php",
	type:"POST",
	cache:false,
	data:{course_id:course_id},
  cache: false,
success: function(course)
{
$("#course_table").html(course);
} 
});
 
});
});
</script>

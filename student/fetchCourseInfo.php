<?php 
    include('../function/db.php');


    $output='';
    $course = $_POST['course_id'];
    $output .= '  
    <table class="table" id="course_selected_table">
    <thead class="text-muted">
        <tr class="small text-uppercase">
        <th scope="col">Course</th>
        <th id="cet_req" >CET Requirements</th>
        <th>GPA Requirements</th>
        <th>Slot</th>
        </tr>
        </thead>'; 

    $query    = "SELECT * FROM `coursestbl` WHERE course_id = $course; ";


    $result = mysqli_query($db, $query);


  while ($row = mysqli_fetch_array($result))
  {

   if ($row["course_img"] == ''){
      $row["course_img"] = 'WMSU_SEAL.jpg';
   }

    $output .= '  
    <tr>  
    <td>
   <div class="user-info">
								<div class="user-info__img">
                        <img src="../collegeimg/'.$row["course_img"].'" alt="User Img">
								</div>
								<div class="user-info__basic">
									<h5 class="mb-0">'.$row["course_name"].'</h5>
								
								</div>
							</div>
    </td>
    
    <td>'.$row['cet_req'].'</td>
    <td>'.$row['gpa_req'].'</td>
    <td>'.$row['quota'].'</td>
    </tr>  
';  

  } 

  $output .='</table>    ';
  echo $output;

?>

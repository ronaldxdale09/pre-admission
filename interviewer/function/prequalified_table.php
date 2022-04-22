<?php  
 include('../../function/db.php');
 $output = '';  


$interviewer = mysqli_query($db, "SELECT * from interviewer 
  LEFT JOIN college ON interviewer.college_id = college.college_id
  LEFT JOIN users ON interviewer.user_id = users.id
  where user_id ='".$_SESSION['id']."'"); 
$rowCollege = mysqli_fetch_array($interviewer);

$college = $rowCollege['college_name'];
 

$sql  = "SELECT * from selectedcourse LEFT JOIN users ON selectedcourse.user_id = users.id
LEFT JOIN coursestbl ON selectedcourse.course_id = coursestbl.course_id
LEFT JOIN college ON selectedcourse.college_id = college.college_id
LEFT JOIN attachment ON selectedcourse.file_id = attachment.id WHERE userStatus='PREQUALIFIED'
AND  college_name = '$college' AND  inter_score IS NULL "; 


 $result = mysqli_query($db, $sql);  
 $output .= '  
    <table class="table display" id="prequalified_student">
        <thead class="text-dark">
        <tr>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Course</th>
        <th>Student Type</th>
        <th>Cet</th>
        <th>Gpa</th>
        <th>Action</th>
        </tr>
        
        <th hidden></th>
        <th ></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th hidden></th>
        <th></th>

        </thead>
        <tbody>';  
 if(mysqli_num_rows($result) > 0)  
 {  
      while($arr = mysqli_fetch_array($result))  
      {  

           $output .= '  
           <tr>

           <td style="display:none">'.$arr["selectedCourse_id"].'</td>
           <td>'.$arr["fname"].' </td>
           <td>'.$arr["lname"].'  </td>
           <td>'.$arr["course_name"] .' </td>
           <td>'.$arr["studentType"] .'</td>
           <td>'.$arr["cetValue"].' </td>
           <td>'.$arr["gpaValue"].' </td>
           <td style="display:none">'.$arr["email"].'</td>
           <td style="display:none">'.$arr["contactNo"].' </td>
           <td style="display:none">'.$arr["img"].' </td>
           <td style="display:none">'.$arr["address"].' </td>
           <td style="display:none">'.$arr["applicantid"].' </td>
           <td style="display:none">'.$arr["cet_path"].' </td>
           <td style="display:none">'.$arr["gpa_path"].' </td>
           <td style="display:none">'.$arr["gmoral_path"].'</td>

           <td>

               <button type="submit" name="" class="btn btn-success scheduleBtn">Assign</button>

           </td>
           ';  
      } 
      
}
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">No entry</td>  
                     </tr>';  
 }  
 $output .= '
 </tbody>
 </table>  


      </div>';  
 echo $output;  
 ?>




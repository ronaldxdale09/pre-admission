<?php 


  $listSelectedCourse = mysqli_query($db, "SELECT COUNT(*) from selectedcourse where user_id  ='".$_SESSION['id']."'"); 
  $countCourse = mysqli_fetch_array($listSelectedCourse);
 
  if ( $countCourse[0] >= 3){

    echo "<script>
    Swal.fire({
        icon: 'info',
        title: 'You can only apply for 3 Courses',
        text: 'Please contact the admission officer for concerns',
      }).then(function() {
        window.location = 'index.php';
    });
    
        </script>";
  


  }
 


?>
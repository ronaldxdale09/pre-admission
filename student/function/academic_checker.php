<?php 
  $date = date("Ymd");

  $query    = "SELECT * FROM `admissionbatch` WHERE is_active=1";
  $result = mysqli_query($db, $query) or die(mysql_error());
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
 
  if ( $date > $row['end_date']){

    echo "<script>
    Swal.fire({
        icon: 'info',
        title: 'Pre-admission time is over',
        text: 'Please contact the department for concern',
      }).then(function() {
        window.location = 'index.php';
    });
    
        </script>";
  


  }
  elseif ($date < $row['start_date']) {

    echo "<script>
    Swal.fire({
        icon: 'info',
        title: 'Pre-admission is currently close',
        text: 'Please contact the department for concern',
      }).then(function() {
        window.location = 'index.php';
    });
    
        </script>";
  


  }



?>
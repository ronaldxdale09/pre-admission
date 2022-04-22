<?php
   $email="";
   if(isset($_SESSION['email'])){
       $username = $_SESSION['email'];
   }
   $sql=mysqli_query($db,"SELECT * FROM users WHERE email='$email'");
   $count = mysqli_num_rows($sql);
   if($count == 0){
       echo "	<script type='text/javascript'>
                   alert('Session Expired');
                   window.location='/pre-admission/index.php';
               </script>";
   }
?>
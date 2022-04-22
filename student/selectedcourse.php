<link rel="stylesheet" href="assets/css/table.css">
<?php
  
  $selectedCourse = mysqli_query($db, "SELECT * from selectedcourse where user_id  ='".$_SESSION['id']."'"); 
?>

<hr>
<table class="table">
    <thead>
        <tr>
            <th>Course</th>

            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($selectedCourse)) { 
                    
                    //  GET COURSE INFORMATION
                $courseinfo    =mysqli_query($db, "SELECT * from coursestbl where course_id  ='".$row['course_id']."'"); 
                $course = mysqli_fetch_array($courseinfo);
                ?>
        <tr>
            <td>
                <div class="user-info">
                    <div class="user-info__img">
                        <img src="../collegeimg/<?php echo $course["course_img"]?>" alt="User Img">
                    </div>
                    <div class="user-info__basic">
                        <h6 class="mb-0"><?php echo $course["course_name"] ?></h6>

                    </div>
                </div>
            </td>
            <td>
                <span class="active-circle bg-success"></span> <?php echo $row['userStatus'] ?>
            </td>

            <td>
                <a href="application_status.php?tracking_id=<?php echo $row['selectedCourse_id']; ?>"
                    class="btn btn-success btn-sm"> STATUS</a>
            <td>
        </tr>

        <?php } ?>

    </tbody>
</table>
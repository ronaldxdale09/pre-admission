<?php
 include('db.php');
$msg = "";
if (isset($_POST['upload'])) {

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "images/" . $filename;

    // Get all the submitted data from the form
    $userNamez = $_SESSION['login_user'];
    $sql = "UPDATE users SET image_text = '{$filename}' WHERE `username` = '" . $_SESSION['login_user'] . "'";

    // Execute query
    mysqli_query($db, $sql);

    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        $msg = "Image uploaded successfully";
        header("Location: UserProfile.php");
    } else {
        $msg = "Failed to upload image";
    }
}
$result = mysqli_query($db, "SELECT * FROM users");

?>
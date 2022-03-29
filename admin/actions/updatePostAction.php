<?php
require "../db/database.php";
if(isset($_FILES['image'])){
    $error = array();
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    if(empty($error)==true){
        move_uploaded_file($file_tmp,"../uploads/.$file_name");
    }
    else{
        print_r($error);
        die();
    }
}
session_start();
$author = $_SESSION['userid'];
$post_id = $_POST['p_id'];
$title = $_POST['title'];
$catagory = $_POST['catagory'];
$desc = $_POST['description'];
$date = date("d M, Y");
$update_query = "UPDATE post SET p_title='$title',p_author=$author,p_catagory=$catagory,p_description='$desc',p_image='$file_name',p_date='$date' where p_id=$post_id";
$db = new database();
$result = $db->update_data($update_query);

if($result == true){
    header("Location: ../../index.php");
}
else{
    echo "error";
}

?>
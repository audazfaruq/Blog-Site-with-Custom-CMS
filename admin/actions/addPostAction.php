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

$title = $_POST['title'];
$author = $_POST['author'];
$catagory = $_POST['catagory'];
$desc = $_POST['description'];
$date = date("d M, Y");
$insert_query = "INSERT INTO post (p_title,p_author,p_catagory,p_description,p_image,p_date) VALUES ('$title',$author,$catagory,'$desc','$file_name','$date')";
$db = new database();
$result = $db->insert_data($insert_query);

if($result == true){
    header("Location: http://localhost:3000/index.php");
}
else{
    echo "error";
}

?>
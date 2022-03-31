<?php 
require "../db/database.php";

    $post_id = $_GET['p_id'];

    $delete_query = "DELETE FROM post WHERE p_id = $post_id";
    $db = new database();
    $result = $db->delete_data($delete_query);
    if ($result == true) {
        header("Location: ../dashboard/allPost.php");
    } else {
        echo "Error deleting the post. Try again later.";
    }

?>
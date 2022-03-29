<?php 
include "inc/userHeader.php";
require "admin/db/database.php";
$p_id = $_GET['p_id']; ?>
 
    <div class="main">
        <?php
        $fetch_query = "SELECT * FROM post  INNER JOIN myadmin ON post.p_author = myadmin.ad_id 
        INNER JOIN catagory ON post.p_catagory = catagory.c_id WHERE p_id = $p_id";
        $db = new database();
        $result = $db->fetch_data($fetch_query);
        $row = mysqli_fetch_assoc($result);
        ?>
        <div class="heading">
            <h1><?php echo $row['p_title']; ?></h1>
            <hr>
        </div>
        
        <div class="posts">
        
            <div class="post">
                <div class="titlecatagory">
                    <h2><?php echo $row['p_title']; ?></h2>
                    <p><a href="singleCatagoryPost.php?catagory_id=<?php echo $row['p_catagory'];?>"><?php echo $row['c_name']; ?></a></p>
                </div>
                <div class="image">
                    <img src='admin/uploads/.<?php echo $row['p_image']; ?>'>
                </div>
                <div class="authordate">
                <p><a href="singleAuthorPost.php?author_id=<?php echo $row['p_author'];?>"> <?php echo $row['ad_name']; ?></a></p>
                    <p id="pdate"><?php echo $row['p_date']; ?></p>
                </div>
                <div class="descritption" id="des">
                    <p><?php echo $row['p_description'] ?></p>
                </div>
            </div>
        </div>
    </div>
<?php include "inc/userFooter.php" ?>
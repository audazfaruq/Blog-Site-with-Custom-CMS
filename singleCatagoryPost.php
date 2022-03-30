<?php 
include "inc/userHeader.php";
require "admin/db/database.php";
$catagory_id = $_GET['catagory_id']; ?>
 
 <div class="main">
 <div class="heading">
        <?php
        $fetch_query = "SELECT * FROM post INNER JOIN myadmin ON post.p_author = myadmin.ad_id 
        INNER JOIN catagory ON post.p_catagory = catagory.c_id where p_catagory = $catagory_id";
        $db = new database();
        $result = $db->fetch_data($fetch_query);
        $row1 = mysqli_fetch_assoc($result);
        ?>
            <h1>All Post of <?php echo $row1['c_name']; ?> Catagory.</h1><br>
            <hr>
        </div>

        <div class="posts">
            <?php
                if(mysqli_num_rows($result)){
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>      
            <div class="post">
                <div class="titlecatagory">
                    <h2><?php echo $row['p_title']; ?></h2>
                    <p><?php echo $row['c_name']; ?></a></p>
                </div>
                <div class="image">
                    <img src='admin/uploads/.<?php echo $row['p_image']; ?>'>
                </div>
                <div class="authordate">
                <p><a href="singleAuthorPost.php?author_id=<?php echo $row['p_author'];?>"> <?php echo $row['ad_name']; ?></a></p>
                    <p id="pdate"><?php echo $row['p_date']; ?></p>
                </div>
                <div class="descritption">
                    <p><?php echo $row['p_description'] ?></p>
                </div>
                <div class="button">
                    <a id="readmore" href="singlePost.php?p_id=<?php echo $row['p_id'];?>"> 
                        <button>Read More..</button>
                    </a>
                </div> 
            </div>
            <?php }  } ?>
        </div>
    </div>
<?php include "inc/userFooter.php" ?>
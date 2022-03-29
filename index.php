<?php 
include "inc/userHeader.php";
require "admin/db/database.php"; ?>
 
 
    
    <div class="main">
        <div class="heading">
            <h1>Latest Posts</h1>
            <hr>
        </div>

        <div class="posts">
            <?php
                $fetch_query = "SELECT * FROM post INNER JOIN author ON post.p_author = author.a_id 
                INNER JOIN catagory ON post.p_catagory = catagory.c_id";
                $db = new database();
                $result = $db->fetch_data($fetch_query);
                if(mysqli_num_rows($result)){
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>      
            <div class="post">
                <div class="titlecatagory">
                    <h2><?php echo $row['p_title']; ?></h2>
                    <p><a href=""><?php echo $row['c_name']; ?></a></p>
                </div>
                <div class="image">
                    <img src='admin/uploads/.<?php echo $row['p_image']; ?>'>
                </div>
                <div class="authordate">
                    <p><a href=""><?php echo $row['a_name']; ?></a></p>
                    <p id="pdate"><?php echo $row['p_date']; ?></p>
                </div>
                <div class="descritption">
                    <p><?php echo $row['p_description'] ?></p>
                </div>
                <div class="button">
                    <a id="readmore" href="singlepost.php?p_id=<?php echo $row['p_id'];?>"> 
                        <button>Read More..</button>
                    </a>
                </div> 
            </div>
            <?php }  } ?>
        </div>
    </div>
<?php include "inc/userFooter.php" ?>
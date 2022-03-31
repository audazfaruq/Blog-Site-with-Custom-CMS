<?php
include "../inc/adminHeader.php";
require "../db/database.php";
session_start();
if(!isset($_SESSION ['username']))
{
    header("Location: ../index.php");
}
else
{
?>
    <div class="main">
        <div class="heading">
            <h1>All Posts</h1>
            <hr>
        </div>

        <div class="posts">
            <?php
                $author = $_SESSION['userid'];
                $fetch_query = "SELECT * FROM post INNER JOIN myadmin ON post.p_author = myadmin.ad_id 
                INNER JOIN catagory ON post.p_catagory = catagory.c_id where ad_id = $author";
                $db = new database();
                $result = $db->fetch_data($fetch_query);
                if(mysqli_num_rows($result)){
                    while ($row = mysqli_fetch_assoc($result)) {
            ?>      
            <div class="post">
                <div class="titlecatagory">
                    <h2><?php echo $row['p_title']; ?></h2>
                    <p><?php echo $row['c_name']; ?></a></p>
                </div>
                <div class="image">
                    <img src='../uploads/.<?php echo $row['p_image']; ?>'>
                </div>
                <div class="authordate">
                    <p><?php echo $row['ad_name']; ?></a></p>
                    <p id="pdate"><?php echo $row['p_date']; ?></p>
                </div>
                <div class="descritption">
                    <p ><?php echo $row['p_description'] ?></p>
                </div>
                <div class="button">
                    <a id="edit" href="../dashboard/editPost.php?p_id=<?php echo $row['p_id'];?>"> 
                        <button>Edit</button>
                    </a>
                    <a id="dlt" href="../actions/deletePostAction.php?p_id=<?php echo $row['p_id'];?>"> 
                        <button>Delete</button>
                    </a>
                </div> 
            </div>
            <?php }  } ?>
        </div>
    </div>

<?php include "../inc/adminFooter.php" ?>
<?php
}
?>
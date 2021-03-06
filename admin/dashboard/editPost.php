<?php 
include "../inc/adminHeader.php";
require "../db/database.php";
$post_id = $_GET['p_id'];
session_start();
if(!isset($_SESSION ['username']))
{
    header("Location: ../index.php");
}
else
{
    ?>
    <div class="main">
        <h1>Update Post</h1>
        <div class="form">
        <?php
                $fetch_query = "SELECT * FROM post INNER JOIN myadmin ON post.p_author = myadmin.ad_id 
                INNER JOIN catagory ON post.p_catagory = catagory.c_id where p_id = $post_id";
    $db = new database();
    $result = $db->fetch_data($fetch_query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result)) {
            ?>   
            <form action="../actions/updatePostAction.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="p_id" value="<?php echo$row['p_id'] ?>">
                <label for="">Title</label><br>
                <input type="text" name="title" required value="<?php echo$row['p_title'] ?>"><br>
                <label for="">Selected Category</label><br>
                <input type="text" name="catgory" required value="<?php echo$row['c_name'] ?>"><br>
                <label for="">Update Category</label><br>
                <select name="catagory" required>
                    <option value=""selected disabled>Update Category</option>
                       <?php
                         $db = new database();
            $fetch_query = "SELECT * FROM catagory";
            $res = $db->fetch_data($fetch_query);
            while ($catagory = mysqli_fetch_assoc($res)) {
                ?>
                    <option value="<?php echo $catagory['c_id']; ?>"><?php echo $catagory['c_name']; ?></option>
                        <?php
            } ?>
                </select><br>
                <label for="">Description</label><br>
                <textarea rows = "5" cols="50" name = "description" required ><?php echo$row['p_description']; ?></textarea><br>
                <label for="">Image</label><br>
                <input type="file" name="image" required><br>
                <p>Current Image:</p>
                <img id="editing" src="../uploads/.<?php echo $row['p_image']; ?>"><br>
                <input type="submit" value="Submit">
            </form>
            <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
            <script>
                        CKEDITOR.replace( 'description' );
            </script>
            <?php
        }
    } ?>
        </div>
    </div>

<?php include "../inc/adminFooter.php" ?>
<?php
} ?>
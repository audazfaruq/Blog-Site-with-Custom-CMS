<?php
include "../inc/adminHeader.php";
require "../db/database.php";
session_start();
if(!isset($_SESSION ['username']))
{
    header("Location: http://localhost:3000/admin");
}
else
{
?>
    <div class="main">
        <h1>Upload a Post</h1>
        <div class="form">
            <form action="../actions/addPostAction.php" method="post" enctype="multipart/form-data">
                <label for="">Title</label><br>
                <input type="text" name="title" required><br>
                <label for="">Author</label><br>
                <select name="author" required>
                    <option value=""selected disabled>Select Author</option>
                       <?php
                         $db = new database();
                         $fetch_query = "SELECT * FROM author";
                         $res = $db->fetch_data($fetch_query);
                         while ($author = mysqli_fetch_assoc($res)) {
                        ?>
                    <option value="<?php echo $author['a_id']; ?>"><?php echo $author['a_name']; ?></option>
                        <?php  } ?>
                </select><br>
                <label for="">Catagory</label><br>
                <select name="catagory" required>
                    <option value=""selected disabled>Select Catagory</option>
                       <?php
                         $db = new database();
                         $fetch_query = "SELECT * FROM catagory";
                         $res = $db->fetch_data($fetch_query);
                         while ($catagory = mysqli_fetch_assoc($res)) {
                        ?>
                    <option value="<?php echo $catagory['c_id']; ?>"><?php echo $catagory['c_name']; ?></option>
                        <?php  } ?>
                </select><br>
                <label for="">Description</label><br>
                <textarea rows = "5" cols="50" name = "description" required></textarea><br>
                <label for="">Image</label><br>
                <input type="file" name="image" required><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>

<?php include "../inc/adminFooter.php" ?>
<?php
}
?>
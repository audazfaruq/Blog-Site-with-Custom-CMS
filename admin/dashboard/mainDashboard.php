<?php
include "../inc/adminHeader.php";
require "../db/database.php";
session_start();
$id= $_SESSION ['userid']; 
if(!isset($_SESSION ['username']))
{
    header("Location: ../index.php");
}
else
{
    
?>
    <div class="main">
        <div class="heading">
        <?php 
        $fetch_query = "SELECT * FROM myadmin where ad_id = $id";
        $db = new database();
        $result1 = $db->fetch_data($fetch_query);
        $row1 = mysqli_fetch_assoc($result1);
        ?>
            <h1>Welcome <?php echo $row1['ad_name']; ?>.</h1><br>
            <hr>
        </div>
    </div>

<?php include "../inc/adminFooter.php" ?>
<?php
}
?>
<?php
include "../inc/adminHeader.php";
require "../db/database.php";
session_start();
$name = $_SESSION ['username']; 
if(!isset($_SESSION ['username']))
{
    header("Location: ../index.php");
}
else
{
    
?>
    <div class="main">
        <h1>Welcome <?php echo strtoupper($name);?></h1>
    </div>

<?php include "../inc/adminFooter.php" ?>
<?php
}
?>
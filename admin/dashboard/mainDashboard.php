<?php
include "../inc/adminHeader.php";
require "../db/database.php";
session_start();
if(!isset($_SESSION ['username']))
{
    header("Location: http://localhost:3000/admin/index.php");
}
else
{
?>
    <div class="main">
        Hi
    </div>

<?php include "../inc/adminFooter.php" ?>
<?php
}
?>
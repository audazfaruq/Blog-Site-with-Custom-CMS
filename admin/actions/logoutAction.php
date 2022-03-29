<?php
session_start();
session_unset();
session_destroy();
if($_SESSION['username']==null)
{
    header("Location: http://localhost:3000/admin/index.php");
}
else
{
    echo "User is already logged in";
}

?>
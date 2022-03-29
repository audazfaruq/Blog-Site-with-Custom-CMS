<?php
session_start();
session_unset();
session_destroy();
if($_SESSION['username']==null)
{
    header("Location: ../index.php");
}
else
{
    echo "User is already logged in";
}

?>
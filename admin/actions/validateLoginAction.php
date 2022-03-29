<?php
    if(isset($_POST['login'])){
        require "../db/database.php";
        $db = new database();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $fetch_query = "SELECT * FROM myadmin WHERE ad_user_name = '$username' AND ad_pass = '$password' ";
        $result = $db->fetch_data($fetch_query);

            if(mysqli_num_rows($result)>0){
                $data = mysqli_fetch_assoc($result);
                $username = $data['ad_user_name'];
                $password = $data['ad_pass'];
                $userid = $data['ad_id'];

                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $_SESSION["userid"] = $userid;

                header("Location: http://localhost:3000/admin/dashboard/mainDashboard.php");
            }
            else{
                echo "Your Crediantial Is Wrong";
            }
}
?>
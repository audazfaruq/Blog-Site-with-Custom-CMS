<?php
session_start();
if(isset($_SESSION ['username']))
{
    header("Location: http://localhost:3000/admin/dashboard/mainDashboard.php");
}
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/adminStyle.css">
    <link rel="shortcut icon" href="https://cdn.dribbble.com/users/24078/screenshots/15522433/media/e92e58ec9d338a234945ae3d3ffd5be3.jpg?compress=1&resize=400x300"/>
    <title>Admin Login</title>
</head>
<body>
    <div class="container">
        <div class="top">
            <h1>Admin Login</h1>
            <img src="https://cdn.dribbble.com/users/24078/screenshots/15522433/media/e92e58ec9d338a234945ae3d3ffd5be3.jpg?compress=1&resize=400x300"" alt="">
        </div>
        <div class="form">
            <form action="actions/validateLoginAction.php" method="post">
                <label for="">User Name:</label><br>
                <input type="text" name="username" required><br>
                <label for="">Password:</label><br>
                <input type="password" name="password" required><br>
                <button name="login" name="submit" type="submit">Login</button><br>
                <div class="extra">
                    <button type="button" class="cancelbtn">Cancel</button><br>
                    <span class="forget">Forgot <a href="#">password?</a></span>
                </div>
            </form>
            
        </div>
        <h1>Fanjum Tech Inc @2022</h1>
    </div>
    
</body>
</html>
<?php } ?>
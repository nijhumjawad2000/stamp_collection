<?php
// error_reporting(0);
session_start();
include("connection.php");
?>
<form action="" method="post">
Username: <input type="text" name="username" value=""/><br><br>
Password: <input type="password" name="password" value=""/><br><br>
<input type="submit" name="submit" value="Login">
</form>

<?php
if(isset($_POST['submit'])){
   $user=$_POST['username'];
   $pwd=$_POST['password'];
   $query = "SELECT * FROM admin WHERE name='$user' && password='$pwd' ";
    $data = mysqli_query($conn,$query);
    $total = mysqli_num_rows($data);
    if($total==1){
        $_SESSION['username']=$user;
        header('location:display.php');
    }
    else{
        echo "Login faild";
    }
}
?>
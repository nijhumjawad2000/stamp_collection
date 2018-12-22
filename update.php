<?php
session_start();
include("connection.php");
if(!isset($_SESSION['username'])){
    header("location:login.php");
    }
error_reporting(0);
$_GET['rn'];
$_GET['sn'];
$_GET['cl'];
$_GET['co'];
$_GET['sz'];
$_GET['cn'];
$_GET['gl'];
?>

<html>
<head>
</head>
<body>
    <form action="" method="GET">
        serial no <input type="text" name="id" value="<?php echo $_GET['rn']; ?>"><br><br>
        Name <input type="text" name="name" value="<?php echo $_GET['sn']; ?>"><br><br>
        year <input type="text" name="year" value="<?php echo $_GET['cl']; ?>"><br><br>
        country <input type="text" name="country" value="<?php echo $_GET['co']; ?>"><br><br>
        size <input type="text" name="size" value="<?php echo $_GET['sz']; ?>"><br><br>
        count <input type="text" name="count" value="<?php echo $_GET['cn']; ?>"><br><br>
        glued <input type="text" name="glued" value="<?php echo $_GET['gl']; ?>"><br><br>
        <input type="submit" name="submit" value="update">
    </form>
<?php
if($_GET['submit']){
    $id=$_GET['id'];
    $name=$_GET['name'];
    $year=$_GET['year'];
    $country=$_GET['country'];
    $size=$_GET['size'];
    $count=$_GET['count'];
    $glued=$_GET['glued'];
    $query = "UPDATE stamp SET NAME = '$name' ,country ='$country',year='$year',size ='$size',count='$count',glued='$glued' WHERE id='$id'";
    $data=mysqli_query($conn,$query);
    if($data){
        echo"record update sucses. <a href='display.php'>check update list here</a>";
    }
    else{
        echo "record not update. <a href='display.php'>check update list here</a>";
    }
}
else{
    echo "click on update button for save change";
}

?>
</body>
</html>
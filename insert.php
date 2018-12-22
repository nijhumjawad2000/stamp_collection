<?php
session_start();
include("connection.php");
if(!isset($_SESSION['username'])){
    header("location:login.php");
    }
// error_reporting(0);
?>
<html>
<head>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
        <!-- id <input type="text" name="id" value=""><br><br> -->
        Name <input type="text" name="name" value=""><br><br>
        year <input type="text" name="year" value=""><br><br>
        country <input type="text" name="country" value=""><br><br>
        size <input type="text" name="size" value=""><br><br>
        <input type="file" name="uploadfile" value=""><br><br>
        count <input type="text" name="count" value=""><br><br>
        glued <input type="text" name="glued" value=""><br><br>
        
        <input type="submit" name="submit" value="submit">
    </form>
<?php
if(isset($_POST['submit'])){
    // $id=$_POST['id'];
    $name=$_POST['name'];
    $year=$_POST['year'];
    $country=$_POST['country'];
    $size=$_POST['size'];
    $count=$_POST['count'];
    $glued=$_POST['glued'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "stamps/".$filename;
// echo $folder;
    move_uploaded_file($tempname,$folder);

    if($name!="" && $year!="" && $filename!="" &&$country!="" &&$size!="" &&$count!="" &&$glued!=""){
        $query = "INSERT INTO stamp VALUES ('id','$name','$country','$year','$size','$folder','$count','$glued')";
        $data = mysqli_query($conn, $query);

        if($data){
        ?>
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=display.php">
        <?php
        }
    }else{
        echo "all field are requred";
    }
}

?>
</body>
</html>
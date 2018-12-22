<style>
table{
    margin:auto;
}
td{
    padding:10px;
    border:1px solid black;
    text-align:center;
    background-color:pink;
}
.head{
    background-color:powderblue;
    padding:20px;
}
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
</style>
<?php
include("connection.php");
error_reporting(0);
?>
<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="glude.php">Glued</a></li>
  <li><a href="not_glued.php">Not Glued</a></li>
  <li><a href="count.php">Count</a></li>
  <li><a href="year.php">Year Issued</a></li>
  <li style="float:right"><a href="login.php">Admin</a></li>
</ul>
<?php
$query = "SELECT * FROM stamp";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);

if($total !=0){
    ?>
    <table>
        <tr>
            <td>serial no</td>
            <td>Image</td>
            <td>Name</td>
            <td>country</td>
            <td>year</td>
            <td>size</td>
            <td>count</td>
            <td>glued</td>
        
        </tr>
    
    <?php
    while($result=mysqli_fetch_assoc($data)){
        echo   " <tr>
                <td>".$result['id']."</td>
                <td><a href='$result[pic_src]'><img src='".$result['pic_src']."'height='100' width='100' /></a></td>
                 <td>".$result['name']."</td>
                 <td>".$result['country']."</td>
                <td>".$result['year']."</td>
                <td>".$result['size']."</td>
                <td>".$result['count']."</td>
                <td>".$result['glued']."</td>
                 </tr>";
    }
    
}
else{
    echo "no record found";
}
// echo $result['id'].$result['name'].$result['year']."<br>";
?>
</table>

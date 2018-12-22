<?php
session_start();
include("connection.php");
 
if(!isset($_SESSION['username'])){
header("location:login.php");
}
?>
<style>
a:link {
  text-decoration: none;
}

a:visited {
  text-decoration: none;
}

a:hover {
  text-decoration: none;
}

a:active {
  text-decoration: none;
}
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
<ul>
  <li><a class="active" href="display.php">Home</a></li>
  <li><a href="insert.php">Insert</a></li>
  <li><a href="admin_glued.php">Glued</a></li>
  <li><a href="admin_not_glued.php">Not Glued</a></li>
  <li><a href="admin_count.php">Count</a></li>
  <li><a href="admin_year.php">Year Issued</a></li>
  <li style="float:right"><a href="logout.php">Log out</a></li>
</ul>
<?php
$query = "SELECT * FROM stamp WHERE glued = 'yes'";
$data = mysqli_query($conn, $query);
$total = mysqli_num_rows($data);
if($total !=0){
    ?>
    <table>
        <tr>
        <td><h3>serial no</h3></td>
            <td><h3>Image</h3></td>
            <td><h3>Name</h3></td>
            <td><h3>country</h3></td>
            <td><h3>year</h3></td>
            <td><h3>size</h3></td>
            <td><h3>count</h3></td>
            <td><h3>Glued</h3></td>
            <td><h3>Update</h3></td>
            <td><h3>Delete</h3></td>
           
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
                <td><a href='update.php?rn=$result[id]&sn=$result[name]&cl=$result[year]&co=$result[country]&sz=$result[size]&cn=$result[count]&gl=$result[glued]'>Edit</td>
                <td><a href='delete.php?rn=$result[id]&sn=$result[name]&cl=$result[year]&co=$result[country]&sz=$result[size]&cn=$result[count]&gl=$result[glued]'onclick='return checkdelete()'>delete</td>
              
                 </tr>";
    }
    
}
else{
    echo "no record found";
}
// echo $result['id'].$result['name'].$result['year']."<br>";
?>
</table>
<script>
function checkdelete()
{
    return confirm('are u sure');
}
</script>
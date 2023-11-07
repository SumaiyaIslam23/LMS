<?php
include"engine/db.php";
session_start();
$id = $_GET['id'];

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM student where id='$id'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
// start session when logged in // 

while($row = $result->fetch_assoc()) {;?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
      <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
  <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    </head>

<body>
<div class="container">

      <fieldset> <legend id="legend"> <h2>Card Info</h2></legend>  

<img src="images/<?php echo $row['profile_pic'];?>" class="imgcenter">

<table align="center"> 
    <tr> <td> Card Number:  </td> <td> <?php echo $row['id'];?></td></tr>
    <tr> <td> User Name:  </td> <td > <?php echo $row['firstname'];?> <?php echo $row['lastname']?></td></tr>
      <tr> <td> User ID:  </td> <td> <?php echo $row['user_id'];?></td></tr>
      <tr> <td> Issued Date:  </td> <td> <?php echo $row['datenow'];?></td></tr>
        <tr> <td> Leveltearm:  </td> <td> <?php echo $row['user_address'];?></td></tr>
    <tr> <td> User Address:  </td> <td> <?php echo $row['user_address'];?></td></tr>

      <tr> <td> Signuture: </td><td><img src="images/<?php echo $row['signature'];?>" class="signuture"></td></tr>

    </table>

        <?php  }};?>  
          <button onclick="window.print()" class="center">Print this page</button>

      </fieldset>



</div>


    </body>


</html
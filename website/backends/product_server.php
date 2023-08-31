<?php
include("logout.php");

$db = mysqli_connect('localhost','root','','data');
$user = $_SESSION['username'];
$query = "SELECT id FROM users WHERE username='$user' LIMIT 1";
$result = mysqli_query($db, $query);
$res = mysqli_fetch_assoc($result);
$sid = $res['id'];

if (isset($_POST['submit_btn'])) {


  $title = mysqli_real_escape_string($db,$_POST['title']);
  $des = mysqli_real_escape_string($db,$_POST['description']);
  $price = mysqli_real_escape_string($db,$_POST['price']);
  $category = mysqli_real_escape_string($db,$_POST['selection']);
  $s_id = mysqli_real_escape_string($db,$sid);


  if($_POST['division']==0) $div = 'Dhaka';
  else if($_POST['division']==1) $div = 'Rajshahi';
  else if($_POST['division']==2) $div = 'Chottogram';
  else if($_POST['division']==3) $div = 'Khulna';
  else if($_POST['division']==4) $div = 'Rangpur';
  else if($_POST['division']==5) $div = 'Barishal';
  else $div = 'Sylhet';

  $division = mysqli_real_escape_string($db,$div);

  if(isset($_POST['negotiable'])) {
    $negotiable = mysqli_real_escape_string($db,'yes');
  }
  else $negotiable = mysqli_real_escape_string($db,'no');

  $phone_number = mysqli_real_escape_string($db,$_POST['phone_number']);

  $temp = $_POST['para'] . ',' . $_POST['thana'] . ',' . $_POST['district'] . ',' .$div;
  ///echo("$temp");
  $location = mysqli_real_escape_string($db,$temp);

  /// storing in Database

  $sql = "INSERT INTO products (title,description,price,phone_number,location,negotiable,category,division,availability,s_id)
        VALUES('$title', '$des', '$price', '$phone_number', '$location', '$negotiable', '$category', '$division', '1','$s_id')";
  $result = mysqli_query($db,$sql);
  
        if(!$result)
        {
          
          header('Location: ../product_reg.php');
          
        }
        else
        {
          header("Location: ../products.php");
        
        }

}


?>

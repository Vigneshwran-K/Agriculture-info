<?php include("backends/logout.php");
  $user = $_SESSION['username'];
  $db = mysqli_connect('localhost', 'root', '', 'data');
  $query = "SELECT * FROM users WHERE username='$user' LIMIT 1";
  $result = mysqli_query($db, $query);
  $res = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manage Profile</title>
    <link rel="shortcut icon" href="images/logo.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src = "scripts/modal_login.js"></script>
    <link href="css/style.css" rel="stylesheet">
  </head>
<body style="background-color:#F8F9FB">


  <?php include("header.php");?>


  <div class="container" style="background-color:#EBEBEB;padding-top: 20px;">
    <div class="row">
      <div class="col-md-12">
        <h2><center>User Informations<center></h2>
        <br><br>
        <div>
        <h3><center><i class="fas fa-user"></i> <?php echo($res['username']); ?></center></h3>
        <p><center><i class="fas fa-phone"></i> <?php echo($res['phone_number']); ?></center></p>
        <p><center><i class="fas fa-at"></i> <?php echo($res['email']); ?><center></p>
        <p><center><i class="fas fa-address-book"></i> <?php echo($res['location']); ?></center></p><br>
        </div>
        <div class="text-center">
        <button class="btn btn-success">Update Info</button>
        <br><br>

        <button class="btn btn-secondary">Update Password</button>
        </div>
        <br>
        <br>
      </div>
   
        </div>

    </div>
  </div>
</div>

  <?php include("footer.php"); ?>
</body>
</html>

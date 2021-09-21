
<?php
$rdetail = false;
$wdetail = false;
include ("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $lemail = $_POST["lemail"];
   $lpass = $_POST["lpass"];
   $login = "SELECT * FROM `user888` WHERE `email` = $lemail `password` = $lpass ";
   $run = mysqli_query($conn, $login) or die(mysqli_error($conn));
   if ($run) {
      $rdetail = true;
   }
   else{
       $wdetail = true;
   }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=<, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</head>
<body>
    <?php
    include ("extra/navbar.php");
    ?>
     <?php
    if ($wdetail) {
        echo ' <div class= container> 
        <div class="alert alert-danger" role="alert">
        Enter Correct Email Address and Password!
      </div> 
      </div> ';
    }
    if ($rdetail) {
        echo ' <div class= container> 
        <div class="alert alert-success" role="alert">
        Logged in Succesfully!
      </div> 
      </div> ';
    }
    
    ?>
    <div class="container">
    <form action = "login.php" method = "post">
  <div class="mb-3">
    <label for="lemail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="lemail" name = "lemail" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="lpass" class="form-label">Password</label>
    <input type="password" class="form-control" id="lpass" name = "lpass">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Remember Me</label>
  </div>
  <button type="submit" class="btn btn-primary">Login</button>
</form>
    </div>
</body>
</html>
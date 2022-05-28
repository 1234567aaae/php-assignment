<?php
session_start();
$_SESSION["e_mail"]=$_POST["email"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-signin-client_id" content="YOUR_CLIENT_ID.apps.googleusercontent.com">
    <title>www.vainqueur.com/password</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>







<?php
$servername = "localhost";
$username = "root";

$dbname = "vainqueur";

// Create connection
$conn = new mysqli($servername, $username,'', $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, fname, lname, email FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $_SESSION["firname"] =$row["fname"];
    $_SESSION["lasname"] = $row["lname"];
    $_SESSION["E_mail"] = $row["email"];
  }
} else {
  echo "0 results";
}
$conn->close();
?>






    
<div class="m-0 bg-danger text-center py-2 text-white">
    <strong>Assignment</strong>
</div>
<div class="sign-in round">
    <div class="card shadow text-center">
        <i class="fa fa-user-circle fa-user-top text-primary"></i>
        <div class="card-header border-0">
        <strong>Congratiration, <?php echo $_SESSION["lasname"];  ?></strong>
        </div>
        <form action="controller/verify.php" method="post" class="px-3">
            
            <div class="d-flexjustify-content-center">
                <span class="w-75 py-1 px-1 border-primay border" style="border-radius:50px 50px 50px 50px ">
                    <i class="fa fa-user text-primary i"></i>
                    <span><?php echo  $_SESSION["E_mail"]; ?></span>
                </span>
            </div>
            <div class="container my-1 pb-4">
                <input type="password" name="email" class="form-control px-4" placeholder="Password">
                <i class="fa fa-envelope email text-primary i"></i>
            </div>
            
            <div class="container my-1">
                <button type="submit" class="btn btn-primary text-center form-control border-0" style="border-radius:50px 50px 50px 50px;">
                    Next
                </button>
                <div>
                </div>
                <a href="#" class="btn text-center form-control text-danger border-0">forgot password?</a>
            </div>
        </form>
    </div>
</div>
<!--footer we use-->
<div class="footer bg-primary py-2 m-0 px-4 d-flex justify-content-between">
    <div class="py-2 d-flex">
            <li><a href="#" class="text-white px-2 text-decoration-none">About us</a></li>
            <li><a href="#" class="text-white px-2 text-decoration-none">Advertizemnet</a></li>
    </div>
    <div class="text-center"><a href="#"  class="text-white px-2 text-decoration-none">Kigali, Rwanda</a></div>
    <div class="py-2 d-flex">
        <li><a href="#" class="text-white px-2 text-decoration-none">how search work</a></li>
        <li><a href="#" class="text-white px-2 text-decoration-none">Privacy</a></li>
    </div>
</div>
</body>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="bootstrap/js/bootstrap.bundle.js"></script>
</html>
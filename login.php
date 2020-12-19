<?php
  $showalert=false;
  $showerror=false;
  $login=false;
if($_SERVER["REQUEST_METHOD"]=="POST")
{
  
include 'partials/_dbconnect.php';
$username=$_POST['username'];
$password=$_POST['password'];


//$sql= "select * from users where username='$username' AND password='$password' ";
$sql= "select * from users where username='$username' ";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);

if($num==1)
{
  while($row=mysqli_fetch_assoc($result))
  {
    if(password_verify($password,$row['password']))
      {
        $login=true;
        $login=true;
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['username']=$username;
        header("location: welcome.php");
}
else{
  $showerror="Invalid Credentials";
}
}
}
else{
    $showerror="Invalid Credentials";
}
}


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>Login</title>
    <link href="/loginsystem/css/style.css" rel="stylesheet" />
  </head>
  <body>
 
  <?php  require "partials/_nav.php";     ?>
 
<?php
if($login)
{
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success ! </strong>Your are logged in !
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showalert)
{
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success ! </strong>Your account is created now you can login
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
if($showerror)
{
echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Error! </strong>'.$showerror.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>

<div class="container my-3">
<h1 class="text-center">Login to our website</h1>

  <form action="/loginsystem/login.php" method="post">

  <div class="form-group col-md-6">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
  </div>


  <div class="form-group col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="Password">
  </div>

  <div class="form-group col-md-6">
  <label for="text" class="form-label">Forgot password :<a href="/loginsystem/update.php">Click here </a></label>
  </div>
  <button type="submit" class="btn btn-primary my-2">Login</button>
</form>


</div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
  </body>
</html>
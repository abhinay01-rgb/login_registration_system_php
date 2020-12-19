<?php


if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true)
{
    $loggedin=true;
}
else
{
  $loggedin=false;
}
 echo ' 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/loginsystem/login.php">iSecure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-1 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/loginsystem/login.php">Home</a>
        </li>';

if(!$loggedin){
        echo '<li class="nav-item">
          <a class="nav-link" href="/loginsystem/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/loginsystem/signup.php">Signup</a>
        </li>';
}
if($loggedin)
{
     echo'<li class="nav-item">
          <a class="nav-link" href="/loginsystem/logout.php">Logout</a>
        </li>';
}


        echo '</ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control me-1" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>' ;
?>

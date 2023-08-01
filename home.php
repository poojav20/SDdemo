<?php
//include session.php file
include("session.php");
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <link rel="stylesheet" href="styles.css">
</head>
<header>
    <nav id="navbar">
        <img src="./pictures/sdllogo.png" alt="Logo image">
    </nav>
</header>
<body>
<nav>
  <a href="demo.php">HOME</a>
  <a href="#">Opportunities</a>
  <div id="indicator"></div>
</nav>
<?php
        include "db.php";
       $query="select * from users where 'username'";
       $result=mysqli_query($con,$query);
?>
     <div class="formed">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>

        <?php 
        $username=$_SESSION["username"];
         $findresult = mysqli_query($con, "SELECT * FROM users WHERE username= '$username'");
        if($res = mysqli_fetch_array($findresult))
{
$username = $res['username']; 
$email = $res['email'];  
}
?>
<table class="table">
          <tr>
              <th>Username </th>
              <td><?php echo $username; ?></td>
          </tr>
           <tr>
              <th>Email </th>
              <td><?php echo $email; ?></td>
          </tr>
          </table>
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-6">
         <a href="updatepassword.php"><button type="button" class="btn btn-warning">Change Password</button></a>
            </div>
            <div class="col-sm-6">
         <a href="logout.php"><button type="button" class="btn btn-warning">Logout</button></a>
            </div>
           </div>
           </div>
        </div>
</div> 
</body>
</html>
    <!DOCTYPE html>

<html>
    <head>
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <link rel="stylesheet" href="login.css">
        <body>
        <?php
    require('db.php');
    session_start();
        // When form submitted, check and create user session.
        if (isset($_POST['username'])) {
            $username = stripslashes($_REQUEST['username']);    // removes backslashes
            $username = mysqli_real_escape_string($con, $username);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($con, $password);
            // Check user is exist in the database
            $query    = "SELECT * FROM `users` WHERE username='$username'
                         AND password='$password' ";
            $result = mysqli_query($con, $query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            if ($rows == 1) {
                $_SESSION['username'] = $username;
                // Redirect to user dashboard page
                header("Location: home.php");
            } else {
                echo "<div class='form'>
                      <h3>Incorrect Username/password.</h3><br/>
                      <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                      </div>";
            }
        } else {
    ?>
            <form class="form" method="post" name="login">
                <img src="./pictures/sdllogo.png" class="logo">
                <input type="text" class="user-details" name="username" placeholder="User Name" required/>
                <input type="password" class="user-details" name="password" placeholder="Password" required/>
                <label>
                    <input type="checkbox" name="remember" class="remember"> Remember me
                  </label>
                <span class="password"><a href="#"> Forgot Password?</a></span>   
                <input type="submit" value="Login" name="submit" class="login-button"/>
                <p class="link">New User?<a href="registration.php">    Register NOW!</a></p>
          </form>
          <?php
    }
?>
        </body>
    </head>
</html>
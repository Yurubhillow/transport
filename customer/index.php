<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HILLOWS TRANSPORT</title>
    <link rel="stylesheet" href="../css/main.css">
<style>
.message{
    margin-top: 20px;
    color:tomato;
    font-style:italic;
}
</style>
</head>
<body>
<main>
<header>
                        <nav>
                        <a href="" class="brand">HILLOWS TRANSPORT</a>
                            <ul class="links">
                                <li><a href="../index.php">Home</a></li>
                                <li><a href="index.php">Customer Login</a></li>
                                <li><a href="../admin/index.php">Admin Login</a></li>
                                <li><a href="../staff/index.php">Staff Login</a></li>
                                <!-- <li><a href="">Track shipment</a></li> -->
                            </ul>
                        </nav>
                    </header>
        <section class="main">
           <div class="login-form"><br>
              <h2 style="color:dodgerblue;">Customer Login</h2>
              <?php
                    if(isset($_REQUEST['message']))
                    {
                      $message = $_REQUEST['message'];
                      echo "<p class='message'>".$message."</p>";
                    }
                ?>
              <br>
              <form action="backend/index.php" method="post">
                <input type="email" placeholder="Enter Email" name="email"><br>
                <br>
                <input type="password" placeholder="Enter Password" name="password"><br>
                <br>
                <input type="submit" value="Login"><br>
                <br>
                <a href="signup.php">Create Account</a><br>
                <br>
                <!-- <a href="">Forgot password?</a> -->
              </form>
           </div> 
        </section>
        <?php include_once("includes/footer.php") ; ?>
    </main>
</body>
</html>
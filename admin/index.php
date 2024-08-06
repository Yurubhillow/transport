<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HILLOWS</title>
    <link rel="stylesheet" href="../css/main.css">
<style>
input[type="text"]{
    width: 80%;
    height: 40px;
    padding-left: 10px;
}
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
                                <li><a href="../customer/index.php">Customer Login</a></li>
                                <li><a href="../admin/index.php">Admin Login</a></li>
                                <li><a href="../staff/index.php">Staff Login</a></li>
                                <!-- <li><a href="">Track shipment</a></li> -->
                            </ul>
                        </nav>
                    </header>
        <section class="main">
           <div class="login-form"><br>
              <h2 style="color:dodgerblue;">Admin Login</h2>
              <?php
                    if(isset($_REQUEST['message']))
                    {
                      $message = $_REQUEST['message'];
                      echo "<p class='message'>".$message."</p>";
                    }
                ?>
              <br>
              <form action="backend/index.php" method="post">
                <input type="text" placeholder="Enter Username" name="username"><br>
                <br>
                <input type="password" placeholder="Enter Password" name="password"><br>
                <br>
                <input type="submit" value="Login">
              </form>
           </div> 
        </section>
        <?php include_once("includes/footer.php") ; ?>
    </main>
</body>
</html>
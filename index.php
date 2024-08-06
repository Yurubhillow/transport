<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HILLOWS TRANSPORT</title>
</head>
<body>
    <main>
        <?php include_once("includes/header.php") ;?>
        <section class="main">
           <div class="tracking-form"><br>
              <h2 style="color:dodgerblue;">Track shipment</h2>
              <br>
              <form action="track.php" method="post">
                <input type="text" placeholder="Enter tracking Number" name="ref_number">
                <input type="submit" name="submit">
              </form>
           </div> 
        </section>
        <?php include_once("includes/footer.php") ; ?>
    </main>
</body>
</html>
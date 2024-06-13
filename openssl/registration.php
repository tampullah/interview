<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Registration</title>
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
</head>
<body style="background-color:blue;">
    
    
    <div class="container">
        <div class="row justify-content-center ">
            <div class="col-md-6 m-5">
            <?php 
                if(isset($_SESSION['error'])){
                    echo "<div class='alert alert-danger text-white'>".$_SESSION['error']."</div>";
                    unset($_SESSION['error']);
                }

                if(isset($_SESSION['feedback'])){
                    echo "<div class='alert alert-success text-white'>".$_SESSION['feedback']."</div>";
                    unset($_SESSION['feedback']);
                }
            ?>
            <h1 class="mb-3 text-white text-center">Register Here</h1>
            <form action="reg_submit.php" method="post" class="form-control" >
                <div class="mb-2">
                    <input type="text" name="name" id="name" placeholder="Please Enter Your Fullname" class="form-control">
                </div>
                <div class="mb-2">
                    <input type="email" name="email" id="email"  placeholder="Please a valid Email Address" class="form-control">
                </div>
                <div class="mb-2">
                    <input type="text" name="phone" id="phone" minlength="11" placeholder="Please Enter a valid Phone Number" class="form-control">
                </div>
                <div class="text-center">
                <button type="submit" name="btnsubmit" value="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</body>
</html>
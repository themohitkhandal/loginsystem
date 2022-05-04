<?php 
$insert = false;
$mismatch = false;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    include 'partials/_dbconnect.php';

    //Function to check any special char
    function test_input($data){
        $data = trim($data);
        $data = stripcslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //Collecting Post variables
    $username = test_input($_POST['username']);
    $password = test_input($_POST['password']);
    $cpassword = test_input($_POST['cpassword']);

    //SQL Query
    $sql = "INSERT INTO `user`.`users`(`sno`, `username`, `password`) VALUES ('sno','$username','$password')";



    // Check and execute
    if($password == $cpassword){
        $result = $con->query($sql);
        if($result){
            $insert = true;
        }else {
            echo "Something went wrong!" . mysqli_error($con);
        }
    }else{
        $mismatch = true;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>iSecure</title>
  </head>
  <body>
    <?php require 'partials/_nav.php'?>
    <?php 
        
        if($insert == true){
            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Success</strong> Your account is created and you can login. <a href='login.php'>login</a>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>";
            // header("Location: /login.php");
        }
    ?>
    
    <h1 class="text-center my-4">SignUp</h1>
    <div class="container">
    <form action="signup.php" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
            <label for="cpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
            <div id="passwordHelp" class="form-text">Make sure to enter same password.</div>
            <?php 
                if($mismatch == true){
                    echo "<div class='alert alert-danger' role='alert'>
                            Password Mismatch! Pleae enter same password.
                         </div>";
                }
            ?>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>
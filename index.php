<?php

require 'connection.php';

if(!empty($_SESSION['logged_in'])){
    header("Location: admin.php");
    die();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT name, role, username, password FROM tblmp5 
    WHERE username = '$username' && password = '$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $_SESSION['logged_in'] = $username;
        unset($_SESSION['login_msg']);
        header("Location: admin.php");
        die();
      } else {
        $_SESSION['login_msg'] = "Username & Password doesn't exist!";
      }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body style="background-color: #dbdbdb">

    <div id="example-div" class="d-flex  justify-content-center" style="height:100vh">
    <form action="index.php" method="POST" class="align-self-center p-5 rounded-4" style="background-color: #ffffff">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Username </label>
            <input type="text" class="form-control" name="username" id="exampleInputEmail1" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
        </div>
        <div class="mb-3">

            <?php
                if(!empty($_SESSION['login_msg'])){
                    echo "<p>".$_SESSION['login_msg']."</p>";
                }
            ?>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="reset" class="btn btn-warning">Reset</button>
    </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
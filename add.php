<?php
require 'connection.php';
require_once 'session.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO tblmp5 (name, role, username, password)
    VALUES ('$name', '$role', '$username', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        $_SESSION['add_msg'] = "New User created successfully";
    } else {
        $_SESSION['add_msg'] =  "Error: " . $sql . "<br>" . $conn->error;
    }

    header('Location: admin.php');
    die();
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

<body>

    <div class="container mt-5">

        <h1> Add User </h1>

        <a href="admin.php" class="btn btn-warning"> Cancel </a>

        <form action="add.php" method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input required type="text" name="name" class="form-control" id="fullname">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input required type="text" name="role" class="form-control" id="role">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input required type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>
            <button required type="submit" class="btn btn-primary">Add</button>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
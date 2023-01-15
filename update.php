<?php
require 'connection.php';
require 'session_admin.php';

$id = $_GET['id'];

$sql = "SELECT id, name, username, password, role FROM tblmp5 WHERE id = $id";
$result = $conn->query($sql);
$user = $result->fetch_assoc();


if($_SERVER['REQUEST_METHOD'] == "POST"){ 

    $name = $_POST['name'];
    $role = $_POST['role'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE tblmp5 SET 
            name='$name',
            role = '$role',
            username = '$username',
            password = '$password'
            WHERE id= $id";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['update_msg'] = "User updated successfully";
    } else {
        $_SESSION['update_msg'] =  "Error updating User: " . $conn->error;
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

        <h1> Edit User </h1>

        <a href="admin.php" class="btn btn-warning"> Cancel </a>

        <form action="update.php?id=<?=$id?>" method="POST">
            <div class="mb-3">
                <label for="fullname" class="form-label">Full Name</label>
                <input required type="text" name="name" class="form-control" id="fullname" value="<?= $user['name'] ?>" >
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input value="<?= $user['role'] ?>" required type="text" name="role" class="form-control" id="role">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input value="<?= $user['username'] ?>" required type="text" name="username" class="form-control" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input value="<?= $user['password'] ?>" type="password" name="password" class="form-control" id="password">
            </div>
            <button required type="submit" class="btn btn-primary">Update</button>
        </form>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
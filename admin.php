<?php

require 'connection.php';
require_once 'session.php';

$sql = "SELECT id, name, username, role FROM tblmp5";
$result = $conn->query($sql);

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

        <h1> Hi <?= $_SESSION['logged_in'] ?>! </h1>

        <?php
            if(!empty($_SESSION['delete_msg'])){
                echo "<h3>" . $_SESSION['delete_msg'] . "</h3>";
                unset($_SESSION['delete_msg']);
            }
            else if(!empty($_SESSION['add_msg'])){
                echo "<h3>" . $_SESSION['add_msg'] . "</h3>";
                unset($_SESSION['add_msg']);
            }
            else if(!empty($_SESSION['update_msg'])){
                echo "<h3>" . $_SESSION['update_msg'] . "</h3>";
                unset($_SESSION['update_msg']);
            }
        ?>

        <a href="add.php" class="btn btn-primary"> Add User </a>
        <a href="logout.php" class="btn btn-warning"> Logout </a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Role</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                while ($row = $result->fetch_assoc()) :
                ?>
                    <tr>
                        <th scope="row" style="vertical-align: middle;"> <?= $row['id'] ?> </th>
                        <td style="vertical-align: middle;"><?= $row['name'] ?></td>
                        <td style="vertical-align: middle;"><?= $row['username'] ?></td>
                        <td style="vertical-align: middle;"><?= $row['role'] ?></td>
                        <td>
                            <a href="update.php?id=<?= $row['id'] ?>" class="btn btn-warning"> Edit </a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger"> Delete </a>
                        </td>
                    </tr>

                <?php
                endwhile;
                ?>
            </tbody>
        </table>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>
<?php
require 'connection.php';
require 'session_admin.php';

$id = $_GET['id'];

//sql to delete a record
$sql = "DELETE FROM tblmp5 WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $_SESSION['delete_msg'] = "User deleted successfully";
} else {
    $_SESSION['delete_msg'] =  "Error deleting user: " . $conn->error;
}

header('Location: admin.php');

?>

<?php
require 'connection.php';

unset($_SESSION['logged_in']);
unset($_SESSION['logged_role']);
header("Location: index.php");

?>
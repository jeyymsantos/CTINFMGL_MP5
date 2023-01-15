<?php
require 'connection.php';

unset($_SESSION['logged_in']);
header("Location: index.php");

?>
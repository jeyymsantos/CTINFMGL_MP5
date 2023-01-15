<?php

if(empty($_SESSION['logged_in'])){
    header("Location: index.php");
    die();
}else{
    if($_SESSION['logged_role'] == 'customer'){
        header("Location: customer.php");
    }
}

?>
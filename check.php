<?php 
session_start();
if (isset($_SESSION['email'])) {
    if ((time() - $_SESSION['last_login']) > 3600) {
        header("location:index.php");
    }
}

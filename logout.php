<?php
session_start();
if (session_destroy()) {
    if (isset($_COOKIE["email"])) {
        setcookie("email", "");
    }
    if (isset($_COOKIE["password"])) {
        setcookie("password", "");
    }
    header("location:index.php");
}else {
    header("location: index.php");
}
?>
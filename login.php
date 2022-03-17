<?php
session_start();
include 'conecter.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = ($_POST['email']);
    $password = ($_POST['password']);

    if (empty($email)) {
        header("location:index.php?error=email is required");
    exit();

    }else if(empty($password)){
        header("location:index.php?error=password is required");
    exit();

    }else{
        $sql="SELECT * FROM comptes WHERE email='$email' AND password='$password'";
        $result=mysqli_query($conne,$sql);
        
      if (mysqli_num_rows($result) >0) {
          $row=mysqli_fetch_assoc($result);
          if ($row['email']===$email && $row['password']===$password) {
              if (!empty($_POST['check'])) {
                  setcookie('email',$_POST['email'],time()+(300));
                  setcookie('password',$_POST['password'],time()+(300));
              }
              
              $_SESSION['email'] = $row['email'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['id'] = $row['id'];
              $_SESSION['last_login'] = time();
              header("location:hello.php");
            exit();

          }else {
            header("location:index.php?error=email or password inccorect");
            exit();
        }
        }else{
        header("location:index.php?error=email or password inccorect");
    exit();
      }
    }

    }else{
    header("location:index.php");
    exit();
}

?>
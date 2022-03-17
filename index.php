<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN IN</title>
    <!-- css -->
    <link rel="stylesheet" href="./log in.css">
    <!-- cdn alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="text-center">

    <main class="form-signin">
        <form class="one h-auto" method="POST" id="myform">
            <h1><span class="border-start border-4 border-info">E-classe</span></h1>
            <h3 class=" mb-3" style="color: blue;"><b>SIGN UP</b></h3>
           
            <div class="email mt-3">
                <label for="name ">Name</label>
                <input id="nom" type="text" name="name" class="form-control mt-2 " id="floatingInput" placeholder="Enter your name" required>
            </div>
            <div class="email mt-3">
                <label for="email ">Email</label>
                <input id="email" type="email" name="email" class="form-control mt-2 " id="floatingInput" placeholder="Enter your email" required>
            </div>
            <div class="password mt-3">
                <label for="password">Password</label>
                <input id="pass" type="password" name="password" class="form-control mt-2 " id="floatingPassword" placeholder="Enter your Password" required>
            </div>
            <div class="password mt-3">
                <label for="password">Confirme</label>
                <input id="pass" type="password" name="passwordtwo" class="form-control mt-2 " id="floatingPassword" placeholder="Enter your Password" required>
            </div>
            
            <button class="btn  btn-primary" type="submit" name="sub">inscrire</button>
            

            <p class="mt-3 pb-3 text-muted">Hve an account?<a href="signin.php">Login Here</a></p>
        </form>
    </main>

</body>
<script src="validation.js"></script>

</html>
<?php
include ('conecter.php');
if (isset($_POST['sub'])) {
    $email = $_POST['email'];
    $sql="SELECT * FROM comptes where email='$email'";
    $q=mysqli_query($conne,$sql);
    if (mysqli_num_rows($q)==0) {    
        if ($_POST['password']==$_POST['passwordtwo']) { 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "INSERT INTO comptes(name, email, password) VALUE ('$name', '$email', '$password')";
        $query = mysqli_query($conne,$sql);
        }else{
            echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'votre confirmation inccorect!',
            })
            </script>";
            
        }
    }else
    echo "<script>
        Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'votre email deja existe!',
    })
    </script>";
     
  
}

?>
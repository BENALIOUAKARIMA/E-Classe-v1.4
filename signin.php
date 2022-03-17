
<!DOCTYPE html>
<html lang="en">
<?php
include ('conecter.php');
session_start();
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordhush = md5( $_POST['password']);
    $sql = "SELECT FROM comptes WHERE email = '$email' && password = $password ";
    $query = mysqli_query($conne,$sql);

}
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIGN IN</title>
    <!-- css -->
    <link rel="stylesheet" href="./log in.css">
    <!-- CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="text-center">

    <main class="form-signin">
        <form class="one h-auto" method="POST" action="login.php">
            <h1><span class="border-start border-4 border-info">E-classe</span></h1>
            <h3 class=" mb-3 "> SIGN IN</h3>

            <?php
            if (isset($_GET['error'])) {?>
                <p class="error"><?php echo $_GET['error'];?></p>
           <?php }?>

            <div id="email" class="form-text mb-3">Enter your credentials to access your account</div>

            <div class="email">
                <label for="email ">Email</label>
                <input type="email" name="email" class="form-control mt-2 " id="floatingInput" placeholder="Enter your email" value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>">
            </div>
            <div class="password mt-3">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control mt-2 " id="floatingPassword" placeholder="Enter your Password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>">
            </div>
            <div class="ml-2 mt-3 text-start">
                <input type="checkbox" name="check" class="w-auto">
                <label >remember me</label>
            </div>
           
            <button class="btn  btn-primary" type="submit" name="submit">sign in</button>
            <p class="mt-3 pb-3 text-muted">D'ont have a account?<a href="index.php">Sign Up Here</a></p>
        </form>
    </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>
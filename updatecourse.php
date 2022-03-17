<?php
    include 'conecter.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM courses WHERE id = $id";
    $result = mysqli_query($conne,$sql);
    $update = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>formulaire</title>
    <!-- cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</head>
<body style="background: rgb(180,185,255);
background: linear-gradient(90deg, rgba(180,185,255,1) 26%, rgba(241,185,250,1) 51%, rgba(253,255,218,1) 89%);">

<!-- start body -->
<form class="w-75 mx-auto" style="border-radius: 10px; box-shadow: 0px 0px 5px black; background-color:white;" method="POST" action="">
    <h4 class="mt-4 ms-5 fw-bold pt-3 mb-3" style="color: purple;">UpDate Courses</h4>
    <div>
        <label for="name" class="form-label ms-5 fw-bold">Name</label>
        <input type="name" name="name" value="<?php echo $update['name'] ; ?>"  class="form-control  w-75 ms-5" required>
        </div>
  
        <div >
        <label for="date" class="form-label ms-5 fw-bold mt-3">Date</label>
        <input type="date" name="date"  value="<?php echo $update['date'] ; ?>" class="form-control  w-75 ms-5" required>
        </div>

  <!-- button -->
  <button type="submit" name="submit" class="btn btn-primary mt-4 ms-5 mb-3 fw-bold w-25" style="background-color: purple;" >Save</button>
</form>
<?php
        if (isset($_POST['submit'])){
            $name = $_POST['name'];

            $date = $_POST['date'];

            $sql = "UPDATE courses SET `name`='$name',`date`='$date' WHERE id = $id";
            $result = mysqli_query($conne,$sql);

            echo '
                <script>
                window.location.href = "course.php";
                </script>
            ';
        }
    ?>

</body>
</html>
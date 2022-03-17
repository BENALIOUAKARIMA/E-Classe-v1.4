<?php
    include 'conecter.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $id";
    $result = mysqli_query($conne,$sql);
    $update = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body style="background: rgb(130,195,249); background: linear-gradient(90deg, rgba(130,195,249,1) 0%, rgba(201,255,201,1) 72%, rgba(255,254,195,1) 100%);">

    <form class="w-75 mx-auto" style="border-radius: 10px; box-shadow: 0px 0px 5px black; background-color:white;" method="POST">
        <h4 class="mt-4 ms-5 fw-bold pt-3 mb-3" style="color: purple;">UPDATE Student</h4>
        <div>
            <label for="name" class="form-label ms-5 fw-bold">Name</label>
            <input type="name" value="<?php echo $update['name'] ; ?>" name="name" class="form-control  w-75 ms-5" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label ms-5 fw-bold">Email address</label>
            <input type="email" value="<?php echo $update['email'] ; ?>" name="email" class="form-control w-75 ms-5" required>
        </div>
        <div >
            <label for="phone" class="form-label ms-5 fw-bold">Phone</label>
            <input type="text" value="<?php echo $update['phone'] ; ?>" name="phone" class="form-control w-75 ms-5" required>
        </div>
        <div >
            <label for="enroll_number"  class="form-label ms-5 fw-bold mt-3">Enroll Number</label>
            <input type="text" value="<?php echo $update['enroll_number'] ; ?>" name="enroll_number" class="form-control w-75 ms-5" required>
        </div>
        <div >
            <label for="date" class="form-label ms-5 fw-bold mt-3">Date</label>
            <input type="date" value="<?php echo $update['date'] ; ?>" name="date" class="form-control  w-75 ms-5" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-4 ms-5 mb-3 fw-bold w-25" style="background-color: purple;">Save</button>
    </form>


    <?php
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $enroll_number = $_POST['enroll_number'];
            $date = $_POST['date'];

            $sql = "UPDATE students SET `name`='$name',`email`='$email',`phone`='$phone',`enroll_number`='$enroll_number',`date`='$date' WHERE id = $id";
            $result = mysqli_query($conne,$sql);

            echo '
                <script>
                window.location.href = "list%20student.php";
                </script>
            ';
        }
    ?>


</body>

</html>
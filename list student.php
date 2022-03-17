<?php include ('check.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>liste student</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

</head>

<body>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="fs-6 pt-3 ps-3" id="exampleModalLabel"> <span class="border-start border-4 border-info">E-classe</span></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form class="w-75 mx-auto" style="border-radius: 10px; box-shadow: 0px 0px 5px black; background-color:white;" method="POST">
        <h4 class="mt-4 ms-5 fw-bold pt-3 mb-3" style="color: purple;">ADD NEW STUDENTS</h4>
        <div>
            <label for="name" class="form-label ms-5 fw-bold">Name</label>
            <input type="name" name="name" class="form-control  w-75 ms-5" required>
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label ms-5 fw-bold">Email address</label>
            <input type="email" name="email" class="form-control w-75 ms-5" required>
        </div>
        <div >
            <label for="phone" class="form-label ms-5 fw-bold">Phone</label>
            <input type="text" name="phone" class="form-control w-75 ms-5" required>
        </div>
        <div >
            <label for="enroll_number"  class="form-label ms-5 fw-bold mt-3">Enroll Number</label>
            <input type="text" name="enroll_number" class="form-control w-75 ms-5" required>
        </div>
        <div >
            <label for="date" class="form-label ms-5 fw-bold mt-3">Date</label>
            <input type="date" name="date" class="form-control  w-75 ms-5" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary mt-4 ms-5 mb-3 fw-bold w-25" style="background-color: purple;">Save</button>
    </form>
    <?php
        include 'conecter.php';
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $enroll_number = $_POST['enroll_number'];
            $date = $_POST['date'];

            $sql = "INSERT INTO students(name, email, phone, enroll_number, date) VALUES ('$name','$email','$phone','$enroll_number','$date')";
            $result = mysqli_query($conne,$sql);

            echo '
                <script>
                    window.location.href = "list%20student.php";
                </script>
            ';
        }
    ?>

</div>

    </div>
  </div>
</div>
    <div id="container" class="d-flex">
        <!-- start sidebar-->
        <?php
       include('sidebar.php')

       ?>
        <div class="container">
            <!-- start navbar -->
            <?php
       include('navbar.php')

       ?>
            <div class="container">
                <div class="container d-flex align-items-center justify-content-between mt-3">
                    <h4>Student List</h4>
                    <div class="d-flex  align-items-center"> <i class="bi bi-chevron-expand" style="color: blue;"></i><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">ADD NEW STUDENTS</button>
                    </div>

                </div>
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Enroll number</th>
                            <th scope="col">Date</th>
                            <th></th>
                        </tr>
                        <?php
                            include ('conecter.php');
                            $sql = "SELECT * FROM students";
                            $result = mysqli_query($conne,$sql);
                            if($result){
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo '<tr>
                                            <td><img src="img/std.jpg" alt="photo" style="width: 70px;"></td>
                                            <td>'.$row['name'].'</td>
                                            <td>'.$row['email'].'</td>
                                            <td>'.$row['phone'].'</td>
                                            <td>'.$row['enroll_number'].'</td>
                                            <td>'.$row['date'].'</td>
                                            <td>
                                                <a href="update.php?id='.$row['id'].'"><i class="bi bi-pencil" style="color:blue;"></i></a>
                                                <a href="delete.php?id='.$row['id'].'" onclick="return delet()"><i class="bi bi-trash" style="color: red;"></i></a>
                                            </td>
                                        </tr>';
                                }
                            }
                            if (isset($_GET['ne'])) {
                                echo "<script>
                                Swal.fire({
                                    position: 'top-end',
                                    icon: 'success',
                                    title: 'Delete Success',
                                    showConfirmButton: false,
                                    timer: 1500
                                  })
                                
                                </script>";
                            }
                            mysqli_close($conne);
                            
                        ?>
                    </thead>
                    <script>
                        function delet(){
                            return confirm('are you sure ');
                        }
                    </script>

            </div>
        </div>

    </div>

    </div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>
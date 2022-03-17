<?php include ('check.php');?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <h3 class="fs-6 pt-3 ps-3"> <span class="border-start border-4 border-info">E-classe</span></h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form class="w-75 mx-auto" style="border-radius: 10px; box-shadow: 0px 0px 5px black; background-color:white;" method="POST" action="">
    <h4 class="mt-4 ms-5 fw-bold pt-3 mb-3" style="color: purple;">ADD NEW COURSES</h4>
    <div>
        <label for="name" class="form-label ms-5 fw-bold">Name</label>
        <input type="name" name="name" class="form-control  w-75 ms-5" required>
        </div>
  
        <div >
        <label for="date" class="form-label ms-5 fw-bold mt-3">Date</label>
        <input type="date" name="date" class="form-control  w-75 ms-5" required>
        </div>

  <!-- button -->
  <button type="submit" name="submit" class="btn btn-primary mt-4 ms-5 mb-3 fw-bold w-25" style="background-color: purple;" >Save</button>
</form>
     <?php
        include 'conecter.php';
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $date = $_POST['date'];

            $sql = "INSERT INTO courses(name, date) VALUES ('$name','$date')";
            $total = mysqli_query($conne,$sql);

            echo '
                <script>
                    window.location.href = "course.php";
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
                    <h4>List Course</h4>
                    <div class="d-flex  align-items-center"> <i class="bi bi-chevron-expand" style="color: blue;"></i><a href="#"><button type="button" class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#add">Add New Course</button></a>
                    </div>

                </div>
                <table class="table table-striped">

                    <thead>
                        <tr>
                            <th></th>
                            <th scope="col">Name of course</th>
                            <th scope="col">Date of</th>
                            <th></th>
                        </tr>
                        <?php
                            include ('conecter.php');
                            $sql = "SELECT * FROM courses";
                            $result = mysqli_query($conne,$sql);
                            if($result){
                                while ($row = mysqli_fetch_assoc($result)){
                                    echo '<tr>
                                    <td> </td>

                                            <td>'.$row['name'].'</td>
                                            <td>'.$row['date'].'</td>
                                            <td>
                                                <a href="updatecourse.php?id='.$row['id'].'"><i class="bi bi-pencil" style="color:blue;"></i></a>
                                                <a href="deletecourse.php?id='.$row['id'].'" onclick="return delet()"><i class="bi bi-trash" style="color: red;"></i></a>
                                            </td>
                                        </tr>';
                                }
                            }
                            mysqli_close($conne);
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
                        ?>
                    </thead>
                    <script>
                        function delet(){
                            return confirm('are you sure');
                        }
                    </script>
            </div>
        </div>

    </div>

    </div>

</body>

</html>
<?php
include ('check.php');
include ('dashboard.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- css -->
    <link rel="stylesheet" href="home.css">
    <!-- icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <div id="container" class=" position-relative d-flex">
        <!--start sidebar-->
       <?php
       include('sidebar.php')

       ?>
        <div class="container">
            <!-- start navbar -->
            <?php
            include('navbar.php')

            ?>
            <div class="row">
                <div class="col-md-3">
                    <div class="card mb-2" style="background-color: rgb(199, 242, 255);">
                        <div><i class="bi bi-mortarboard ms-2 h2" style="color: rgb(184, 184, 255);"></i></div>
                        <div class="ms-2 mt-2">Students</div>
                        <p style="text-align: right;" class="px-2 mt-2 fw-bold"><?php echo $num_std ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="card mb-2" style="background-color: rgb(255, 210, 215);">
                       <div><i class="bi bi-bookmark ms-2 h2 " style="color: rgb(250, 129, 150);"></i></div>
                       <div class="ms-2 mt-2">Course</div>
                       <p style="text-align: right;" class="px-2 mt-2 fw-bold"><?php echo $num_cour ?></p>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="card mb-2" style="background-color: rgb(255, 255, 223); ">
                        <div><i class="bi bi-currency-dollar ms-1 h2" style="color: rgb(141, 240, 253);"></i></div>
                        <div class="ms-2 mt-2">Payments</div>
                        <p style="text-align: right;" class="px-2 mt-2 fw-bold"><?php echo $array['somme'];?>DHS</p>
                    </div>
                </div>
                <div class="col-md-3">
                <div class="card" style="background: rgb(64, 205, 235); background: linear-gradient(90deg, rgba(64, 205, 235, 1) 46%, rgba(173, 245, 196, 1) 90%, rgba(243, 247, 174, 1) 100%);">
                        <div><i class="bi bi-person ms-1 h2" style="color: white;"></i></div>
                        <div class="ms-2 mt-2" style="color: white;">Users</div>
                        <p style="text-align: right;" class="px-2 mt-2 fw-bold">3</p>
                    </div>
                </div>
            </div>


        </div>
        
    </div>

</body>

</html>
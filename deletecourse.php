<?php
include ('conecter.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM courses WHERE id='$id' ";
    $query = mysqli_query($conne,$sql);
    $result = $conne->query($sql);
    if($result){
        header("location: course.php?ne");
    }else{
        echo "not delete";
    }
?>
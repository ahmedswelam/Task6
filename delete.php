<?php

    require 'dbconn.php';


    $id = $_GET['id'];

    $errors = [''];
    $message = [''];

   $sql = "select * from article where id = $id";
   $op = mysqli_query($con,$sql);


   if (mysqli_num_rows($op) == 1) {
       # code...


    $sql = "DELETE from artical WHERE id = $id";
    $op = mysqli_query($con,$sql);

    if ($op) {
        # code...
        $message = 'article deleted';
    }else{
        $message = 'please try again';
    }
   }

   //header("Location: index.php");

   mysqli_close($con);

?>
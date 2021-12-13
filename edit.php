
<?php 
    require 'dbconn.php';

# Get Data related to id ...... 
   $id = $_GET['id'];

   $sql = "select * from article where id = $id";
   $op   = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) == 1){

        $data = mysqli_fetch_assoc($op);
     }else{
        header("Location: index.php");
     }






if($_SERVER['REQUEST_METHOD'] == "POST"){

// CODE ...... 
$title     = $_POST['title'];
$content    = $_POST['content'];
// $password = Clean($_POST['password']);


# Validation ...... 
$errors = [];

# Validate title 
if(empty($title)){
    $errors['title'] = "Field Required";
}





   if(count($errors) > 0){
       foreach ($errors as $key => $value) {
           # code...
           echo '* '.$key.' : '.$value.'<br>';
       }
   }else{

    // SELECT FROM DATABASES


     $sql = "update article set title = '$title' , content = '$content' where id = $id";
     $op  = mysqli_query($con,$sql);

     if($op){
       $message =  'Data Updated';
     }else{
       $message =  'Error Try Again'.mysqli_error($con); 


                            
     }


   }

        header("Location: index.php");


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
 <title>Edit</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
 <h2>Edit article</h2>


 <form  action="edit.php?id=<?php echo $data['id'];?>"   method="post" >

 

 <div class="form-group">
   <label for="exampleInputName">title</label>
   <input type="text" class="form-control" id="exampleInputtitle"  name="title"  value="<?php echo $data['title'];?>" aria-describedby="" placeholder="Enter title">
 </div>


 <div class="form-group">
   <label for="exampleInputEmail">content</label>
   <input type="textarea"   class="form-control" id="exampleInputcontent" name="content" value="<?php echo $data['content'];?>"  aria-describedby="" placeholder="Enter content">
 </div>


 
 <button type="submit" class="btn btn-primary">Update</button>
</form>
</div>

</body>
</html>
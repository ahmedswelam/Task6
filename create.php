<?php 

    require_once "dbconn.php";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        # code...

        $id = NULL ; 
        $title = $_POST['title'];
        $content = $_POST['content'];

        $errors = [];
        
       
        #validation title
        if (empty($_POST["title"])) {
            # code...
            $errors['title'] = "title is required" .'<br>';
        }elseif ($_POST["title"] > "6") {
            # code...
            $errors['password'] = "password less than 6" .'<br>';
        }

        
        #validatin image
        
        if(!empty($_FILES['image']['name'])){

            $tmpPath    =  $_FILES['image']['tmp_name'];
            $imageName  =  $_FILES['image']['name'];
            $imageSize  =  $_FILES['image']['size'];
            $imageType  =  $_FILES['image']['type'];
        
             // name.ex
        
            $exArray   = explode('.',$imageName);
            $extension = end($exArray);
        
            $FinalName = rand().time().'.'.$extension;
        
            $allowedExtension = ["png",'jpg'];
        
             if(in_array($extension,$allowedExtension)){
                 // code .... 
        
                $desPath = './images/'.$FinalName;
        
                 if(move_uploaded_file($tmpPath,$desPath)){
                     echo 'Image Uploaded';
                 }else{
                     echo 'Error In Uploading file';
                 }
        
        
             }else{
                 echo 'Not Allowed Extension .... ';
             }

             $_SESSION['title'] = $name;
             $_SESSION['content'] = $email;
             $_SESSION['image'] = $FinalName;
        }


        $sql = "INSERT INTO article (title,content,image) VALUES('$title', '$content', 'image')";
        $op = mysqli_query($con,$sql);

        if ($op) {
            # code...
            echo "your information inserted";
        }else{
            echo mysqli_error($con);
        }


        mysqli_close($con);


    }

?> 





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create article</h2>
                    <p>Please fill this form and submit to add new article to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>title</label>
                            <span class="error" style="color: red">* </span> <br>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>content</label>
                            <span class="error" style="color: red">* </span> <br>
                            <textarea name="content" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>image</label>
                            <span class="error" style="color: red">* </span> <br>
                            <input type="file"  id="image" name="image" >
                        </div>
                        <input href="index.php" type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>
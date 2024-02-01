<?php
    $connection = mysqli_connect("localhost","root","","market");
    session_start();
    $query = "SELECT * FROM register  inner JOIN
    images  on register.id=images.img_id where register.`username`='".$_SESSION['username']."'";
    $query_run = mysqli_query($connection,$query);

    if(isset($_POST['submit']))
   {
        if(isset($_POST['submit'])){
            $file_name=$_FILES['image']['name'];
            $tempname=$_FILES['image']['tmp_name'];
            $folder='img/'.$file_name;
            $img_id=$_POST['img_id'];
            $price=$_POST['price'];
            
            $query=mysqli_query($connection, "INSERT INTO images (file,img_id,price) 
            values ('$file_name','$img_id','$price')");
            
            if(move_uploaded_file($tempname, $folder)){
              header('Location:index.php');
            }else{
            
                echo"<h2>file not  uploaded successfully</h2>";
            }
        
        
        
        }
    }

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Market Place</title> 
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-lg-6 col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login Seller</h1>  
                                    
                                    </div>
                                    
                                    <form  method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                   <input type="file" name="image" class="form-control "
                                   placeholder="Files">
                                   </div>
                                   <br>
                                   <div class="form-group">
                                   <input type="text" name="price" class="form-control "
                                   placeholder="Price">
                                   </div>
                                   <br>
 
                                   <div class="form-group">
                                  <input type="hidden" name="img_id" value="<?php echo $row['user_id']?>" class="form-control "
                                  placeholder="Files">
                                 </div>
                                 <button type="submit"  name="submit" class="btn btn-primary btn-user btn-block">
                                 Upload
                               </button>  
                             </form>   

                                    
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
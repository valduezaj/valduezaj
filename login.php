<?php
session_start();
$connection = mysqli_connect("localhost","root","","market");


if(isset($_POST['login']))
{
    $email=$_POST['emailtype'];
    $password=$_POST['passwordtype'];

    $query= "SELECT * FROM register WHERE  username='$email' AND password='$password'";
    $query_run = mysqli_query($connection, $query);
    $user=mysqli_fetch_array($query_run);

    if($user['usertype']=="admin")
    {
        $_SESSION['success'] = 'Added';
        header('Location:admin.php');


    }
    else if($user['usertype']=="user")
    {
        $_SESSION['username'] = $email;
        header('Location:admin.php');


    }

    else

    {

        $_SESSION['status'] = 'email or password invalid';
        header('Location:login.php');

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
                                        <?php
                                  
                                        if(isset($_SESSION['status']) && ($_SESSION['status'] !=''))
                                        {
                                            echo'<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                                            unset($_SESSION['status']);
                                        }
                                       ?>
                                    </div>
                                    <form  method="POST">
                                        <div class="form-group">
                                            <input type="email" name="emailtype" class="form-control "
                                                placeholder="Enter Email Address...">
                                        </div><br>
                                        <div class="form-group">
                                            <input type="password" name="passwordtype" class="form-control "
                                            placeholder="Password">
                                        </div>
                                        <br>
                                        <button type="submit"  name="login" class="btn btn-primary btn-user btn-block">
                                            Login
                                         
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
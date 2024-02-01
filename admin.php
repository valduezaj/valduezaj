<?php
    $connection = mysqli_connect("localhost","root","","market");
    session_start();
   
    if(isset($_POST['delete_btn']))
    {
        $id = $_POST['delete_id'];
    
        $query = "DELETE FROM register WHERE id='$id' ";
        $query_run = mysqli_query($connection, $query);
    
        
        if($query_run)
        {
            
            $_SESSION['success'] ='You Data is DELETED';
            header('Location:admin.php');
        
        }
    
        else{
            $_SESSION['status'] ='You Data is not DELETED';
            header('Location:admin.php');
        
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
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-xl">
        <a class="navbar-brand" href="index.php">Market</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="admin.php">Admin</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="register.php">Register Users</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="registeradmin.php">Register Admin</a>
            </li>

            <li class="nav-item">
            <a class="nav-link" href="login.php">Lagout</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    
    <div class="table-responsive container-xl my-5">
                  <?php
                   

                    $query = "SELECT * FROM register";
                    $query_run = mysqli_query($connection,$query);
                  
                  ?>
                  <table
                    id="example" class="table table-striped data-table" style="width: 100%">

                    <thead>
                      <tr>
                        <th>UserName</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Usertype</th>
                        <th>Edit</th>
                        <th>Delete</th>

                      </tr>
                    </thead>

                    <tbody>
                     <?php

                     if(mysqli_num_rows($query_run)>0)
                      {
                        while($row = mysqli_fetch_assoc($query_run))
                        {
                          ?>
                          <tr>
                            <td><?php echo $row['email']?></td>
                            <td><?php echo $row['username']?></td>
                            <td><?php echo $row['password']?></td>
                            <td><?php echo $row['usertype']?></td>
                            <td>
                            <form action="edit.php" method="POST">
                              <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                              <button type="submit" name="edit" class="btn btn-primary">Edit</button>
                              </form>
                            </td>
                            <td>
                              <form  method="POST">
                              <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                              <button type="submit" name="delete_btn" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>
                          <?php
                        }

                      }   
                      else

                      {
                        echo "No Record Found";
                      }

                     ?>
                      
                    </tfoot>
                  </table>
                </div>
              </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
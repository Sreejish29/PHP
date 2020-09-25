<?php ob_start();?>
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>Info</title>
    </head>
    <body>

        <h1 class="display-4 text-center">User Data</h1>


        <div class="row justify-content-center">
        <div class="col-lg-8">
        <table class="table table-striped table-hover">

            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Password</th>
                <th scope="col">Gender</th>
                <th scope="col">Education</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
                </tr>
            </thead>

            <tbody>



        <?php 
        
            $connection = mysqli_connect('localhost', 'root', '', 'php');

            if($connection)
            {
                $read_query = "SELECT * FROM users";

                $result = mysqli_query($connection, $read_query);
                // print_r($result);

                if($result)
                {
                    $i = 1;
                    while($row = mysqli_fetch_array($result))
                    {
                        $id = $row['id'];
                        $name = $row['user_name'];
                        $email = $row['user_email'];
                        $pass = $row['user_password'];
                        $gender = $row['gender'];
                        $edu = $row['education'];
                        ?>

                        <tr>
                            <th scope="row"><?php echo $i?></th>
                            <td><?php echo $name;?></td>
                            <td><?php echo $email;?></td>
                            <td><?php echo $pass;?></td>
                            <td><?php echo $gender;?></td>
                            <td><?php echo $edu;?></td>
                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $i?>">
                                Update
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal<?php echo $i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Update Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <form action="" method="POST">
                                                <div class="modal-body">

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Name</label>
                                                            <input required type="text" name="u_name" value="<?php echo $name;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            <input required type="hidden" name="u_id" value="<?php echo $id;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input required type="email" name="u_email" value="<?php echo $email;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Password</label>
                                                            <input required type="password" name="u_password" value="<?php echo $pass;?>" class="form-control" id="exampleInputPassword1">
                                                            <small id="passwordHelpInline" class="form-text text-muted">
                                                                Must be 8-20 characters long.
                                                            </small>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Gender</label>
                                                            <input required type="text" name="u_gender" value="<?php echo $gender;?>" class="form-control" id="exampleInputPassword1">
                                        
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Education</label>
                                                            <input required type="text" name="u_education[]" value="<?php echo $edu;?>" class="form-control" id="exampleInputPassword1">
                                        
                                                        </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary" name="update-btn">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>


                            <td>
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal<?php echo $i?>">
                                Delete
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="deleteModal<?php echo $i?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Profile</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="" method="POST">
                                                <div class="modal-body">
                                                    Are You Sure you want to delete <?php echo $name;?>?
                                                </div>
                                                <input required type="hidden" name="delete_id" value="<?php echo $id;?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger" name='delete-btn'>Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <?php

                        

                        $i++;
                    }
                }
                else 
                {
                    echo 'Error :'.mysqli_error($connection);
                }
            }
        
        ?>

        <?php 

            if(isset($_POST['update-btn']))
            {
                $id = $_POST['delete_id'];
                $name = $_POST['u_name'];
                $email = $_POST['u_email'];
                $pass = $_POST['u_password'];
                $gender = $_POST['u_gender'];
                $edu = implode(',', $_POST['u_education']);

                if($connection)
                {
                    $update_query = "UPDATE users SET user_name = '$name', user_email = '$email', user_password = '$pass', gender = '$gender', education = '$edu' WHERE id = $id";
                    $result_update = mysqli_query($connection, $update_query);
                    
                    if($result_update) 
                    {
                        echo "success";
                        header("Location:read.php");
                    }

                    else{
                        echo "Error: ".mysqli_error($connection);
                    }
                }
                else{
                    echo "Error ".mysqli_connect();
                }
            }




            if(isset($_POST['delete-btn']))
            {
                $id = $_POST['u_id'];
                if($connection)
                {
                    $delete_query = "DELETE FROM users WHERE id = $id";
                    $result_delete = mysqli_query($connection, $delete_query);
                    
                    if($result_delete) 
                    {
                        header("Location:read.php");
                    }

                    else{
                        echo "Error: ".mysqli_error($connection);
                    }
                }
                else{
                    echo "Error ".mysqli_connect();
                }
            }
        
        ?>


        </tbody>
    </table>
    </div>
    </div>












        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
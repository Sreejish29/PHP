<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

        <title>Register</title>
    </head>
    <body>
        <h1 class="display-3 text-center">Welcome To PHP</h1>
        <br><br>

        <div class="card mx-auto" style="width: 35rem; border: none; background-color:#ecf4f3">
            <div class="card-body">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input required type="text" name="u_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input required type="email" name="u_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input required type="password" name="u_password" class="form-control" id="exampleInputPassword1">
                        <small id="passwordHelpInline" class="form-text text-muted">
                            Must be 8-20 characters long.
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Gender</label>
                        <div class="custom-control custom-radio">
                            <input type="radio" class="custom-control-input" id="customControlValidation2" name="u_gender" value="male" required>
                            <label class="custom-control-label" for="customControlValidation2">Male</label>
                        </div>
                        <div class="custom-control custom-radio ">
                            <input type="radio" class="custom-control-input" id="customControlValidation3" name="u_gender" value="female" required>
                            <label class="custom-control-label" for="customControlValidation3">Female</label>
                            <div class="invalid-feedback">More example invalid feedback text</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Education</label>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="u_education[]" value='12th' id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">12th</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="u_education[]" value="Diploma" id="customCheck2">
                                <label class="custom-control-label" for="customCheck2">Diploma</label>
                            </div>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                            Check me out, for agreeing with our Terms and Privacy Policy
                        </label>
                        </div>
                    </div>

                    <button required type="submit" name="register_btn" class="btn btn-primary">Register</button>
                </form>
            </div>
        </div>






        <?php

            if(isset($_POST['register_btn'])) 
            {
                $name = $_POST['u_name'];
                $email = $_POST['u_email'];
                $pass = $_POST['u_password'];
                $gender = $_POST['u_gender'];
                $education = implode(',', $_POST['u_education']);

                $connection = mysqli_connect('localhost', 'root', '', 'php');

                if($connection)
                {
                    $create_query = "INSERT INTO users(user_name, user_email, user_password, gender, education) VALUES('$name', '$email', '$pass', '$gender', '$education')";
                    $result = mysqli_query($connection, $create_query);

                    if($result)
                    {
                        echo 'Data Added';
                    }
                    else {
                        echo 'Error while adding data';
                    }
                }

                else
                {
                    echo 'Error'.mysqli_connect();
                }

            }

        ?>






        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
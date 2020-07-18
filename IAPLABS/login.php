<?php
    include_once 'DBConnector.php';
    include_once 'user.php';

    $con = new DBConnector;
    if(isset($_POST['btn_login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $instance = User::create();
        $instance->setPassword($password);
        $instance->setUsername($username);

        if($instance->isPasswordCorrect()){
            $instance->login();

            $con->closeDatabase();
            $instance->createUserSession();
        }
        else{
            $con->closeDatabase();
            session_start();
            $_SESSION['login_errors'] = "Invalid credentials! Please try again...";
            header("Location:login.php");
        }
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>ICS 3104: IAP - Lab</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

 

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>                    
                    
                    
    <body style="background:url(https://farmfolio.net/wp-content/uploads/2018/06/water.jpg);background-size:100% 100%;">              
                    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 m-4">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                        <div class="card-body">
                        <?php
                            session_start();
                            if(!empty($_SESSION['login_errors'])){
                                echo "<div class='alert alert-danger' role='alert'>
                                ".$_SESSION['login_errors']."
                            </div>";
                            unset($_SESSION['login_errors']);

                            }
                        ?>
                       
                            <form  method="post" name="login" id="login" action="<?php echo $_SERVER['PHP_SELF']?>" >
                                
                                <div class="form-group"><label class="small mb-1" for="inputUsername">Username</label><input class="form-control py-4" id="inputUsername" name="username" type="text" placeholder="Enter Username" required="true" /></div>
                                <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter Password" required="true" /></div>
                              
                                
                                
                                <div class="form-group mt-4 mb-0"><button class="btn btn-info btn-block my-4" type="submit" name = "btn_login" value = "btn_login" >Sign in</button></div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <p class="text-center" >Don't have an account? <a href="lab1.php" >Sign up </a></p>
                        </div>

                    </div>
                </div>



            </div>
        </div>

        

    </body>
</html>
<?php
include_once "DBConnector.php";
include_once "user.php";
include 'fileUploader.php';


if(isset($_POST['btn_save'])){
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $city = $_POST['city_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $picName = $_FILES["profilePic"]["name"];
    $utc_timestamp = $_POST['utc_timestamp'];
    $offset = $_POST['time_zone_offset'];

    $user = new User ($first_name, $last_name, $city, $email, $phone, $username, $password, $picName, $utc_timestamp, $offset);
    $uploader = new FileUploader;

    if(!$user->validateForm()){
        $user->createFormErrorSessions();
        header("Refresh:0");
        die();
    }
    if($user->isUserExist($username)){
        session_start();
        $_SESSION['form_errors'] = "Sorry, the username '".$username."' is already in use. Please enter another";
        header("Refresh:0");
        die();
    }
    if($uploader->uploadFile()){
        $res = $user->save();
    }
    else{ $res = false; 
        session_start();
        $_SESSION['form_errors'] = "Error in profile image upload please try again";
        header("Refresh:0");
        die();
    }

    if($res){
        session_start();
        $_SESSION['form_success'] = "Account data save operation successful!";
        header("Refresh:0");
        die();
    }
    else{
        session_start();
        $_SESSION['form_errors'] = "Save operation failed!...Please try again";
        //header("Refresh:0");
        die();
    }
    
}

?>                    
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>ICS 3104: IAP - Lab</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script type="text/javascript" src="js/validate.js"></script>
  <script type="text/javascript" src="js/timezone.js"></script>
  

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
    

</head>                    
                    
                    
    <body style="background:url(https://farmfolio.net/wp-content/uploads/2018/06/water.jpg);background-size:100% 100%;"> 
    <main>             
                    
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 m-4">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4">User Details Form</h3></div>
                        <div class="card-body">
                        <?php
                            session_start();
                            if(!empty($_SESSION['form_errors'])){
                                echo "<div class='alert alert-danger' role='alert'>
                                ".$_SESSION['form_errors']."
                            </div>";
                            unset($_SESSION['form_errors']);

                            }
                        
                            if(!empty($_SESSION['form_success'])){
                                echo "<div class='alert alert-success' role='alert'>
                                ".$_SESSION['form_success']."
                            </div>";
                            unset($_SESSION['form_success']);

                            }
                        ?>
                       
                            <form  method="post" name="user_details" enctype='multipart/form-data' onsubmit = "return(validateForm());" action="#readAllTable" >
                                <div class="form-row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label class="small mb-1" for="imgInp">Upload Profile Image:</label>
                                            <input type="file" name="profilePic" id="imgInp" class="form-control py-1" />
                                        </div>
                                    </div>
                                        <div class="col-md-7">
                                            <div class="form-group"><img id="preview" src="images/default_profile.png" alt="logo image" class="img-fluid img-thumbnail" style="height: 30%; width: 30%" /></div>
                                        </div>
                                </div>
                                
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputFirstName">First Name</label><input class="form-control py-4" id="inputFirstName" name="first_name" type="text" placeholder="Enter First name" /></div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputLastName">Last Name</label><input class="form-control py-4" id="inputLastName" name="last_name" type="text" placeholder="Enter Last name" /></div>
                                        <span class="text-danger"></span>
                                    </div>
                                </div>
                                <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" id="inputEmailAddress" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" /></div>
                                <div class="form-row">
                                    <div class="col-md-4">
                                        <div class="form-group"><label class="small mb-1" for="inputCity">City</label><input class="form-control py-4" id="inputCity" name="city_name" type="text" placeholder="Enter City" /></div>
                                    </div>
                                    
                                    <div class="col-md-8">
                                        <div class="form-group"><label class="small mb-1" for="inputPhone">Phone</label><input class="form-control py-4" id="inputPhone" name="phone" type="text" placeholder="e.g 0712345678"/></div>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputUsername">Username</label><input class="form-control py-4" id="inputUsername" name="username" type="text" placeholder="Enter Username" /></div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" id="inputPassword" name="password" type="password" placeholder="Enter password"/></div>
                                    </div>
                                </div>
                                <input type="hidden" name="utc_timestamp" id="utc_timestamp" value=""/>
                                <input type="hidden" name="time_zone_offset" id="time_zone_offset" value=""/>
                                
                                <div class="form-group mt-4 mb-0"><button class="btn btn-info btn-block my-4" type="submit" name = "btn_save" value = "btn_save" >Sign up</button></div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <p class="text-center">Already have an account? <a href="login.php">Sign in</a></p>
                        </div>

                    </div>
                </div>


            
            </div>
        </div>
        </main>

        <script>
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    
                    reader.onload = function(e) {
                    $('#preview').attr('src', e.target.result);
                    }
                    
                    reader.readAsDataURL(input.files[0]);
                }
                }

                $("#imgInp").change(function() {
                readURL(this);
                });
        </script>

        

    </body>
</html>
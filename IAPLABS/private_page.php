<?php

    include_once 'DBConnector.php';

    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location:login.php");
    }


    function fetchUserAPIKey(){
        $uid = $_SESSION['user_id'];
        $con = new DBConnector();
        
        $sql = "SELECT api_key FROM api_keys WHERE user_id = '$uid'";
        $res = mysqli_query($con->conn,$sql) or die("Error " .mysqli_error($con->conn));    
      
        if ($res->num_rows <= 0) {
            return 'Please Generate an API Key';
        }else{
            while($row = $res->fetch_array()){
                $api_key = $row['api_key'];
            }
        }
        
        return $api_key;
    }
?>

<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>ICS 3104: IAP - Lab</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
 

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/apikey.js"></script>
    

</head>                    
                    
                    
    <body>
    <div class="container">
        
            <p>This is a private page</p>
            <p>We want to protect it....</p><br><br>
            <div>
                <h4>Generate your API Key here:</h4>
                
                <?php $feedback = fetchUserApiKey();
                echo ($feedback==='Please Generate an API Key') ? 
        '<button class="btn btn-primary" id="api-key-btn">Generate API Key</button>' : 
        '<button class="btn btn-light" id="api-key-btn" disabled>Generate API Key</button>';?>
        <br><br>
                <strong>Your API Key:</strong><p>(Note that if your API Key is already in use by running applications, generating a new key will stop the application from running)</p><br>
                <textarea cols="100" rows="2" id="api_key" readonly><?php echo fetchUserAPIKey(); ?></textarea>
            </div>
            <br><br>

            <p><a href="logout.php">Want to Logout?</a></p><br><br>
        <p>Lab one task:</p>
        <div class="table-responsive m-4" id="readAllTable">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">City</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        include_once "DBConnector.php";
                        include_once "user.php";
                        $res = user::readAll();
                        
                        while ($row = mysqli_fetch_array($res)){
                            echo "
                                <tr>
                                    <td>".$row['id']."</td>
                                    <td>".$row['username']."</td>
                                    <td>".$row['first_name']."</td>
                                    <td>".$row['last_name']."</td>
                                    <td>".$row['user_city']."</td>
                                    <td>".$row['user_email']."</td>
                                    <td>".$row['user_phone']."</td>
                                      
                                </tr>
                                ";
                        
                        
                        }
                    ?>
                    </tbody>
                </table>
                </div>
            
        </div>
    
    </body>


</html>
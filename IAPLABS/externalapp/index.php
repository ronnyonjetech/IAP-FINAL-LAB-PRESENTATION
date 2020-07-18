<?php

?>
<html lang="en">

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>ICS 3104: IAP - Lab</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
 

  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript" src="placeorder.js"></script>
    

</head>                    
                    
                    
    <body style="background:url(https://farmfolio.net/wp-content/uploads/2018/06/water.jpg);background-size:100% 100%;">
        <div class="container">
        
        <div class="row justify-content-center">
                <div class="col-lg-7 m-4">
                    <div class="card shadow-lg border-0 rounded-lg mt-5">
                        <div class="card-header"><h3 class="text-center font-weight-light my-4"> External Order System</h3></div>
                        <div class="card-body">
                       
                            <form  method="post" name="order_form" id="order_form" >
                                
                                <div class="form-group"><label class="small mb-1" for="name_of_food">Name Of Food</label><input class="form-control py-4" id="name_of_food" name="name_of_food" type="text" placeholder="Enter Name of Food" required="true" /></div>
                                <div class="form-group"><label class="small mb-1" for="number _of_units">Quantity of Food</label><input class="form-control py-4" id="number_of_units" name="number_of_units" type="number" placeholder="Enter Quantity" required="true" /></div>
                                <div class="form-group"><label class="small mb-1" for="unit_price">Unit Price</label><input class="form-control py-4" id="unit_price" name="unit_price" type="number" placeholder="Enter Unit Price" required="true" /></div>
                                <input id="status" name="status" type="hidden" value="Order Placed and is being processed." />
                              
                                
                                <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block my-4" type="submit" name = "btn-place-order" id="btn-place-order" >Place Order</button></div>
                            </form>
                        </div>
                        <div class="card-footer">
                            <p class="text-center" >Check Order Status <input class="col-lg-3 m-2" id="order_id" type="number" placeholder="Order ID" /><button class = "btn btn-outline-secondary" type="submit" id="btn-check-order" >Check</button></p>
                        </div>

                    </div>
                </div>


                



            </div>
            
        </div>
    
    </body>


</html>
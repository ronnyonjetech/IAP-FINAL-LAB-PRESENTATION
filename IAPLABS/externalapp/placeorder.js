$(document).ready(function(){
    $('#btn-place-order').click(function(event){
        event.preventDefault();
        //recieve all variables
        var name_of_food = $('#name_of_food').val();
        var number_of_units = $('#number_of_units').val();
        var unit_price = $('#unit_price').val();
        var order_status = $('#status').val();

        //building a http post request and sending it using ajax
        $.ajax({

            url: "http://localhost/labs/api/v1/orders/index.php",
            type: "post",
            data: {name_of_food:name_of_food,number_of_units:number_of_units,unit_price:unit_price,order_status:order_status},
            headers:{
                'Authorization':'fyZZsxdgEkE9BpEq7i2ZlDWefYADemST6E9PMBAjS9v8iFr7JoJvyrbhLw5BQLg0'
            },
            success: function (data){
                alert(data['message']);
            },
            error: function(){
                console.error("request failed");
                alert("An error occured");
                
            }
            
        });

    });

    $('#btn-check-order').click(function(event){
        event.preventDefault();
        //recieve all variables
        var order_id = $('#order_id').val();
        

        //building a http post request and sending it using ajax
        $.ajax({

            url: "http://localhost/labs/api/v1/orders/index.php",
            type: "get",
            data: {order_id:order_id},
            headers:{
                'Authorization':'fyZZsxdgEkE9BpEq7i2ZlDWefYADemST6E9PMBAjS9v8iFr7JoJvyrbhLw5BQLg0'
            },
            success: function (data){
                alert(data['message']);
            },
            error: function(){
                console.error("request failed");
                alert("An error occured");
                
            }
            
        });

    });
})
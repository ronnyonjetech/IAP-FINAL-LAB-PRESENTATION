$(document).ready(function(){
    $('#api-kebtn').click(function(event){
        //user confimation
        var confirm_key = confirm("You are about to generate a new API Key");
        if(!confirm_key){
            return;
        }
        $.ajax({
            url: "../apikey.php",
            type: "post",
            success: function(data){
                if(data['success'] == 1){
                    //setting key in textarea
                    console.log('api gen success');
                    $('#api_key').val(data['message']);

                }else{
                    alert("Something went wrong. Please try again");
                }
            }
        });
    });
});

$(document).ready(function(){
    $('#api-key-btn').click(function(event){
        //user confimation
        var confirm_key = confirm("You are about to generate a new API Key");
        if(!confirm_key){
            return;
        }
        $.ajax({
            url: "./apikey.php",
            type: "post",
            success: function(data){
                if(data['success'] == 1){
                    //setting key in textarea
                    console.log('api gen success');
                    $('#api_key').val(data['message']);

                }else{
                    alert("Something went wrong. Please try again");
                }
            }
        });
        document.location.reload(true);
    });
});
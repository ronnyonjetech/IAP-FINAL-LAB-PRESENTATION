
function validateForm() {
      
    if( document.user_details.first_name.value == "" ) {
       alert( "Please provide your First Name!" );
       document.user_details.first_name.focus() ;
       return false;
    }
    if( document.user_details.last_name.value == "" ) {
       alert( "Please provide your Last Name!" );
       document.user_details.last_name.focus() ;
       return false;
    }
    if( document.user_details.city_name.value == "" || document.user_details.city_name.value.length <= 3 ) {
       
       alert( "City name cannot be less than 3 Letters." );
       document.user_details.city_name.focus() ;
       return false;
    }
    if( document.user_details.phone.value == "" || isNaN( document.user_details.phone.value ) || document.user_details.phone.value.length != 10 ) {
       
        alert( "Phone number must be exactly 10 digits" );
        document.user_details.phone.focus() ;
        return false;
     }
    
    return( true );
 }
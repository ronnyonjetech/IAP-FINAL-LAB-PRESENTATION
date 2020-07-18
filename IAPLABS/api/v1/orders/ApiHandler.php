<?php 
include_once '../../../DBConnector.php';

class ApiHandler{
    private $meal_name;
    private $meal_units;
    private $unit_price;
    private $status;
    private $user_api_key;
    /*getters and setters*/

    public function setMealName($meal_name){
        $this->meal_name = $meal_name;
    }
    public function getMealName(){
        return $this->meal_name;
    }
    public function setMealUnits($meal_units){
        $this->meal_units = $meal_units;
    }
    public function getMealUnits(){
        return $this->meal_units;
    }
    public function setUnitPrice($unit_price){
        $this->unit_price = $unit_price;
    }
    public function getUnitPrice(){
        return $this->unit_price;
    }
    public function setStatus($status){
        $this->status = $status;
    }
    public function getStatus(){
        return $this->status;
    }
    public function setUserAPIKey($key){
        $this->user_api_key = $key;
    }
    public function getUserAPIKey(){
        return $this->user_api_key;
    }

    public function createOrder(){
        //saving incoming order
        $order_name = $this->meal_name;
        $units = $this->meal_units;
        $unit_price = $this->unit_price;
        $status = $this->status;

        $res = false;

        $DBConnector = new DBConnector;
        $DBConnection = $DBConnector->conn;


        try{
            
            $stmt = $DBConnection->prepare("INSERT INTO `orders`(`order_name`, `units`, `unit_price`, `order_status`) VALUES (?,?,?,?)");
            
            $stmt->bind_param('ssss' ,$order_name, $units, $unit_price, $status);
            if($stmt->execute()){
                $res = true;
            }
    
            $stmt = null;
            }
            catch(Exception $e){
                echo "An error occured";
        }

        return $res;

    }

    public function checkOrderStatus($orderId){
        $con = new DBConnector();
        $sql = "SELECT order_status FROM orders WHERE order_id = '$orderId'";
        $res = mysqli_query($con->conn,$sql) or die("Error " .mysqli_error($con->conn));    
      
        if ($res->num_rows <= 0) {
            return 'Order not found, Please place an Order First...';
        }else{
            while($row = $res->fetch_array()){
                $orderStatus = $row['order_status'];
            }
        }
        
        return $orderStatus;

    }
    public function fetchAllOrders(){

    }

    public function checkApiKey($api_key){
        
        $con = new DBConnector();
        $sql = "SELECT * FROM api_keys WHERE api_key = '$api_key' ";
        $res = mysqli_query($con->conn,$sql) or die("Error " .mysqli_error($con->conn));    
      
        if ($res->num_rows <= 0) {
            return false;
        }else{
            return true;
        }
        
    }

    public function checkContentType(){

    }


}

?>
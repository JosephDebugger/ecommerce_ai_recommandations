<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
 
    echo "Success";
    // $paystatus=$_POST['pay_status'];
    // $amount=$_POST['amount'];
    
    //you can get all parameter from post request
    print_r($_POST);
}
?>
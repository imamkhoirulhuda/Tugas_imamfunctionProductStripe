<?php
include('Stripegateway.php');
$myStripe = new Stripegateway();

//contoh panggil edit update
$data=["ID"=> "prod_DslYhn660v63LW",
        "name"=>"laptop",
        "caption"=>"teknologi masa kini",
        "description"=> "laptop tercanggih"];
    $result = $myStripe->update_Product($data);
    echo "<pre>"; print_r($result);

 
   $myStripe = new Stripegateway();

      //delete pada product
    $data=["ID"=> "prod_Dsm2DvX78rAvAl"];
    $result = $myStripe->delete_Product($data);
    echo "<pre>"; print_r($result);

?>
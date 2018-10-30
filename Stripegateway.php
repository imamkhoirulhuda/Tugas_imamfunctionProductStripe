<?php

include("./vendor/autoload.php");

class Stripegateway {

	public function __construct(){
		$stripe = array(
			"secret_key" => "sk_test_3qa15MXE5D0A9sCIrnyi3CDA",
			"public_key" => "pk_test_KU7TZwUPzZNURGOOMqUzv141"
			);
		\Stripe\Stripe::setApiKey($stripe["secret_key"]);
	}
public function checkout($data){
	$message = "";
	try{
		$mycard = array('number' => $data['number'],
						'exp_month' => $data['exp_month'],
						'exp_year' => $data['exp_year']);
		$charge = \Stripe\Charge::create(array('card'=>$mycard,
												'amount'=>$data['amount'],
												'currency'=>'usd'));
			$message = $charge->status;
		}catch (Exception $e){
			$message = $e->getMessage();
		}								
		return $message;		
	}

	 public function update_Product($data){
        $message = "";
        try{
            $product = \Stripe\Product::retrieve($data["ID"]);
             $product->name = $data["name"];
             $product->caption = $data["caption"];
            $product->description = $data["description"];
            $message = $product->save();
        }catch (Exception $e){
            $message = $e->getMessage();
        }
        return $message;
    }

    public function delete_Product($data){
        $message = "";
        try{
            $product = \Stripe\Product::retrieve($data["ID"]);
        $message = $product->delete();
        }catch (Exception $e){
            $message = $e->getMessage();
        }
        return $message;
    }
}

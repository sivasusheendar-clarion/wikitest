<?php
Class Amazon implements PaymentMethod {

	public function getConfig() 
	{

	}
	public function getButton($products){

		  /* API KEYS */				
		  $merchantID=AMAZON_MERCHANT_ID;
		  $accessKeyID=AMAZON_ACCESS_KEY_ID;
		  $secretKeyID=AMAZON_SECRET_KEY_ID; 

		   $count=count($products);
		
		   $i = 1;					    	
		   foreach ($products as $product) { 

					$product_title=$product['Product']['name'];

					$item["item_merchant_id_$i"] = $merchantID;  
					$item["item_title_$i"] = $product_title;   
					$item["item_sku_$i"]=$product['Product']['id'];  
					$item["item_price_$i"]=$product['total']/(int)$product['quantity'];
					$item["item_quantity_$i"]=$product['quantity'];
					$item["item_description_$i"]=$product['Product']['description'];
						
					$i++;
		   }	


		   $cartFactory = new MerchantHTMLCartFactory();
		   $calculator = new SignatureCalculator();
		   
    	   $cartFactory->vals=$item;

		   $cart = $cartFactory->getSignatureInput($merchantID,$accessKeyID);
		   $signature = $calculator->calculateRFC2104HMAC($cart,$secretKeyID);
		   $cartHtml = $cartFactory->getCartHTML($merchantID,$accessKeyID,$signature);

		   return $cartHtml;	
		
	}

	public function parseResponse($cart){

			$return = array();

			
						$user = array(
							'first_name' 		=> $cart['User']['first_name'],
							'last_name' 		=> $cart['User']['last_name'],
							'email' 			=> $cart['User']['email']
						);
						

						$address = array(
							'name' 				=> $cart['Address']['name'],
							'address' 			=> $cart['Address']['address'],
							'address2' 			=> $cart['Address']['address2'],
							'city' 				=> $cart['Address']['city'],
							'state' 			=> $cart['Address']['state'],
							'zip' 				=> $cart['Address']['zip'],
						);						
						
						$order = array(
							'card_number' 		=> $cart['Order']['card_number'],
							'card_exp'			=> $cart['Order']['card_exp'],
							'card_type'			=> $cart['Order']['cvv2_code'],
							'invoice_number' 	=> $_REQUEST['amznPmtsOrderIds'],
							'payment_id'		=> 5,
							'fee'				=> '0.00',
							'ship_price' 		=> '',
							'discount'			=> '',
							'tax' 				=> '0.00',
							'total' 			=> $cart['Order']['total'],
							'charged'			=>  $cart['Order']['total'],
                            'hold'              => '0',       
							'ip_address'		=> ''
						
							$purchases=array();

						

					/* Get Products from Cart */
					foreach($cart['Products'] as $id=>$product) {
								
													
										/* Add Products from cart to Purchase */
										$purchases[] = array(
										'product_id' 			=>  $id,
										'unit_cost'				=> $product['Product']['cost'],
										'unit_price' 			=> $product['Product']['price'],
										'quantity' 				=> $product['quantity'],
										);
			
								
					}	


					$return['data'] = array(
							'User' 			=> $user,
							'OrderProduct' 	=> $purchases,
							'Address' 		=> $address,
							'Order' 		=> $order
					);
				
					
				return $return;
	}


	
	
}
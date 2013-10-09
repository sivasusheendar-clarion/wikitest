<?php
Class Dwolla implements PaymentMethod {

	public function getConfig() 
	{

	}

	public function getButton() 
	{

				/* Dwolla Checkout */
				$apiKey=DWOLLA_API_KEY;
				$apiSecret=DWOLLA_SECRET_KEY;
				$token=DWOLLA_TOKEN;
				$pin=DWOLLA_PIN;
				$redirectUrl=REDIRECT_URL;

				$Dwolla = new DwollaCheckoutComponent($apiKey,$apiSecret,$redirectUrl');

				// Set the server mode to test mode
				$Dwolla->setMode('LIVE');

				// Clears out any previous products
				$Dwolla->startGatewaySession();

				$i = 1;					    	
				foreach ($cart['Products'] as $ic_product) { 

				   $product_title=$ic_product['Product']['name']." [Condition:".extend($ic_product['options']['condition']['OptionDescription']['name'], 'Default')."] [Warranty:".extend($ic_product['options']['warranty']['OptionDescription']['name'], 'None')."]";

				 // Add first product; Price = $10, Qty = 1
				 /**
				 * Creates and executes Server-to-Server checkout request
				 * @link http://developers.dwolla.com/dev/docs/gateway#server-to-server
				 * 
				 * @param string $destinationId
				 * @param string $orderId
				 * @param float $discount
				 * @param float $shipping
				 * @param float $tax
				 * @param string $notes
				 * @param string $callback
				 * @param boolean $allowFundingSources
				 * @return string Checkout URL 
				 */	$Dwolla->addGatewayProduct($ic_product['Product']['name'],$ic_product['total']/(int)$ic_product['quantity'],$ic_product['quantity'],$product_title);

			    }
				
				$tax='0.00';
				if($this->data['Address']['state']=='NJ'){
					$tax=number_format($cart['Values']['total'] * .07, 2, '.', '');
					$cart=$this->Cart->calculate($this->data['Address']['state']);
				}	
				
				/* 1% discount */
				$dis=number_format($cart['Values']['total'] * .01, 2, '.', '');
				
				$url = $Dwolla->getGatewayURL(DWOLLA_TOKEN,date('Ymdhis'),$dis,0.00,$tax,'This is a great purchase','http://requestb.in/15s4xb51');
				$button="<a href='{$url}'><input type='image' src='http://help.dwolla.com/customer/portal/attachments/15418' border='0'></a>";

				return $button;				
		
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
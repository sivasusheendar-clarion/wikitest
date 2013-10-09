<?php

require_once ('config.inc.php');
require_once (LIB_PATH.'/interfaces/payment_interface.php');
require_once (LIB_PATH.'/amazon.php');
require_once (LIB_PATH.'/paypal.php');
require_once (LIB_PATH.'/google_checkout.php');
Class Payment implements PaymentMethod {
   private $paymentContext;
   public function __construct($carrier)
   {
      
   		switch($carrier) {
   			case 'paypal' : $this->paymentContext = new Paypal();
   						   break;
            case 'amazon' : $this->paymentContext = new Amazon();
                              break;
   			case 'gc' 	 : $this->paymentContext = new GoogleCheckout();
   						   break;
   			case 'authorize'  : $this->paymentContext = new Authorize();
   						   break;	
   		}
        
   }

   public function getConfig() {
   	 return $this->paymentContext->getConfig();
   }
   public function sendRequest() {
   	return $this->paymentContext->sendRequest();
   }
   public function processResponse(){
   	return $this->paymentContext->parseResponse();
   }
   public function getButton( $products = null){ 
   	return $this->paymentContext->getButton($products);
   }
   public function parseResponse($response){}    
	 
}

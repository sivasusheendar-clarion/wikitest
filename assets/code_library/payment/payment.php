<?php
require_once ('config.inc.php');
require_once ('lib/interfaces/shipping_interface.php');
require_once ('lib/fedex.php');
require_once ('lib/ups.php');
require_once ('lib/usps.php');
Class Payment implements ShippingMethod {
   private $shippingContext;
   public function __construct($carrier)
   {
   		switch($carrier) {
   			case 'fedex' : $this->paymentContext = new Paypal();
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
   public function getButton(){
   	return $this->paymentContext->parseResponse();
   }
	 
}


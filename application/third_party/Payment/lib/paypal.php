<?php
Class Paypal implements PaymentMethod {
	
	public function getRates() 
	{
		 echo 'fedex Rates';
	}
	public function getLabel() 
	{

	}
	public function getValidAddress() 
	{

	}
    
    public function getConfig(){}
    public function getButton($products)
    {  
    
        /**temporarily added following statements **/
         $product['Values']['shipping'] = 10;
         $product['Values']['tax'] = 2;
         $checkoutButtonHtml = '
                    <!-- PayPal Checkout  -->
                    <form method="post" action="'.PAYPAL_URL.'" >
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="rm" value="2">
                    <input type="hidden" name="business" value="'.PAYPAL_BUSINESS_EMAIL.'">
                    <input type="hidden" name="currency_code" value="USD">
                    <input type="hidden" name="shipping" value="'.number_format($product['Values']['shipping'], 2) .'">
                    <input type="hidden" name="tax" value="'.number_format($product['Values']['tax'], 2).'">
                    <input type="hidden" name="return" value="'.PAYPAL_RETURN_URL.'">
                    <input type="hidden" name="notify_url" value="'.PAYPAL_NOTIFY_URL.'">
                    <input type="hidden" name="cancel_return" value="'.PAYPAL_CANCEL_URL.'">
                    ';
           $i = 1;
           if($products['Products']){
               foreach ($cart['Products'] as $ic_product) { 
                   $product_option[$ic_product['Product']['id']]=$ic_product['Option'];
                   $checkoutButtonHtml.= '          
                        <input type="hidden" name="item_name_'. $i.'" value="'. $ic_product['Product']['name'].'"  [Condition:'. extend($ic_product['options']['condition']['OptionDescription']['name'], 'Default').'] [Warranty:'. extend($ic_product['options']['warranty']['OptionDescription']['name'], 'None').']">
                        <input type="hidden" name="item_number_'.$i.'" value="'. $ic_product['Product']['id'].'">
                        <input type="hidden" name="amount_'. $i.'" value="'. number_format($ic_product['total']/(int)$ic_product['quantity'], 2).'">
                        <input type="hidden" name="quantity_'. $i.'" value="'. (int)$ic_product['quantity'].'">
                         ';
                     $i++;   
                  } 
                 /* Products Options */
                 $optional_data=array('options'=>$product_option,'useremail'=>$loguseremail);
                 $options=json_encode($optional_data);
                 $checkoutButtonHtml.= '<input type="hidden" name="custom" value='.$options.'>';             
            }
            if (isset($cart['Packages']) && count($cart['Packages']) > 0) {
               foreach ($cart['Packages'] as $index => $package) {
                  $sublabels="";
                  foreach ($package['Subproducts'] as $subproduct) { 
                      $sublabels .="[".$subproduct['Product']['name']."]";
                   }
            $checkoutButtonHtml.= '<input type="hidden" name="item_name_'. $i.'" value="'. $package['Package']['name'].'.'. $sublabels.'">
                        <input type="hidden" name="item_number_'. $i.'" value="-">
                        <input type="hidden" name="amount_'. $i.'" value="'. number_format($package['total'], 2).'">
                        <input type="hidden" name="quantity_'. $i.'" value="1">';
            
             } }   

            $checkoutButtonHtml .= '<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_xpressCheckout.gif" align="center"  name="submit" alt="Make payments with PayPal - it\'s fast, free and secure!"> </form> ';
           
           return    $checkoutButtonHtml;
    }
    public function sendRequest(){}
    public function parseResponse($response){} 

	
}
<?php
Class GoogleCheckout  implements PaymentMethod {

	public function getConfig() 
	{

	}
	public function getButton($products) 
	{
        $this->Xml->parseFile('googlecheckoutxml.xml');
        $item = array();

        foreach ($data['Products'] as $id => $product) {
                $item[] = array(
                    'item-name' =>
                        array(
                            array('@data' => $product['Product']['name'])
                        ),
                    
                    'item-description' =>
                        array(
                            array('@data' => 'Warranty: '.$product['options']['warranty']['OptionDescription']['name'])
                        ),
                    
                    'unit-price' =>
                        array(
                            array(
                                '@attributes' => array(
                                    'currency' => 'USD'
                                ),
                                '@data' => $product['Product']['price'] + $product['options']['condition']['Option']['price'] + $product['options']['warranty']['Option']['price']
                            )
                        ),
                    
                    'quantity' =>
                        array(
                            array('@data' => $product['quantity'])
                        ),
                    
                    'merchant-item-id' =>
                        array(
                            array('@data' => $id)
                        ),
                    
                    'merchant-private-item-data' =>
                        array(
                            array(
                                'unit-cost' =>
                                    array(
                                        array('@data' => $product['Product']['cost'])
                                    ),
                                'option' => 
                                    array(
                                        array(
                                            'option-id' => array(
                                                array('@data' => $product['options']['warranty']['Option']['id'])
                                            ),
                                            'option-price' => array(
                                                array('@data' => $product['options']['warranty']['Option']['price'])
                                            )
                                        ),
                                        array(
                                            'option-id' => array(
                                                array('@data' => $product['options']['condition']['Option']['id'])
                                            ),
                                            'option-price' => array(
                                                array('@data' => number_format($product['options']['condition']['Option']['price'], 2))
                                            )
                                        )
                                    )
                            )
                        )
                );
            }

            if($data['Packages']){
            
            foreach ($data['Packages'] as $id => $package) {
                
                $subproducts="Sub Products :";
                foreach ($package['Subproducts'] as $subproduct) { 
                   
                        $subproducts .="{".$subproduct['Product']['name']."} ";
                        
                        /* ASSIGN PACKAGE PRODUCT ID'S TO SINGLE ARRAY */
                        $pack[$package['Package']['id']][]=$subproduct['Subproduct']['product_id'];
                        
                    }         
                    
                    /* POST ALL PACKAGE PRODUCTS */
                    $pdata=json_encode($pack);
                
                $item[] = array(
                    'item-name' =>
                        array(
                            array('@data' => $package['Package']['name'])
                        ),
                    
                    'item-description' =>
                        array(
                            array('@data' => $subproducts )
                        ),
                    
                    'unit-price' =>
                        array(
                            array(
                                '@attributes' => array(
                                    'currency' => 'USD'
                                ),
                                '@data' =>  1
                            )
                        ),
                    
                    'quantity' =>
                        array(
                            array('@data' => 1)
                        ),
                    
                    'merchant-item-id' =>
                        array(
                            array('@data' => '')
                        ),
                    
                    'merchant-private-item-data' =>
                        array(
                            array(
                                'package-details' =>
                                    array(
                                        array('@data' =>$pdata)
                                    ),
                                
                            )
                        )
                );
            }

            }


            if ($data['Values']['discount'] > 0) {
                $item[] = array(
                    'item-name' => array(
                        array('@data' => 'Discount')
                    ),
                    'item-description' => array(
                        array('@data' => 'Custom Discount from The DJ House')
                    ),
                    'unit-price' => array(
                        array(
                            '@attributes' => array(
                                'currency' => 'USD'
                            ),
                            '@data' => -1 * $data['Values']['discount']
                        )
                    ),
                    'quantity' => array(
                        array('@data' => '1')
                    )
                );
            }
            
            $this->Xml->contents['checkout-shopping-cart'][0]
                                    ['checkout-flow-support'][0]
                                        ['merchant-checkout-flow-support'][0]
                                            ['shipping-methods'][0]
                                                ['flat-rate-shipping'][0]
                                                    ['price'][0]['@data'] = $data['Values']['shipping'];
            
            $this->Xml->contents['checkout-shopping-cart'][0]
                                    ['shopping-cart'][0]
                                        ['items'][0]
                                            ['item'] = $item;

            $xml = $this->Xml->xml($this->Xml->contents);
            
            $goog_xml = $this->sendRequest($xml);
            
            $this->Xml->parse($goog_xml);

            return $this->Xml->contents['checkout-redirect'][0]['redirect-url'][0]['@data'];

	}
	public function getLabel() 
	{

	}
	public function getValidAddress() 
	{

	} 
}
<?php
require_once (APPPATH.'third_party/Social/config.inc.php');

require_once ('facebook.php');

Class Social {
   
   public function __construct()
   {    
        
   }
   
   public function network($method)
   {    
        $obj = new $method();
        
        $obj->button();
   }
	 
}

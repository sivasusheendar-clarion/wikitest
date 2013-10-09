<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * FusionInvoice
 * 
 * A free and open source web based invoicing system
 *
 * @package		FusionInvoice
 * @author		Jesse Terry
 * @copyright	Copyright (c) 2012 - 2013, Jesse Terry
 * @license		http://www.fusioninvoice.com/support/page/license-agreement
 * @link		http://www.fusioninvoice.com
 * 
 */

class User_Controller extends Base_Controller {

	public function __construct($required_key, $required_val)
	{    
		parent::__construct();
        
        if ($this->session->userdata($required_key) <> $required_val)
		{   
			
			redirect('index');
		}
	}

}

?>

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

class Admin_Controller extends Base_Controller {

	public function __construct()
	{    
		
        parent::__construct('user_type', 1);
        $this->layout->setLayout('admin');    
	}

}

?>
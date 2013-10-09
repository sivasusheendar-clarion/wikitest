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

class Base_Controller extends MX_Controller {

    public $ajax_controller = false;

    public function __construct()
    {    
        parent::__construct();
            
        $this->config->load('fusion_invoice');
      
        $this->load->add_package_path(APPPATH.'third_party/Social/');
        $this->load->library('social', '', 'my_social');
        // Don't allow non-ajax requests to ajax controllers
        if ($this->ajax_controller and !$this->input->is_ajax_request())
        {
            exit;
        }

       $this->load->library('session');
		
        $this->load->helper('url');

        $this->load->database();
        $this->load->library('form_validation');
        $this->load->helper('number');
        $this->load->helper('pager');
        
        $this->load->helper('date');  
        
        // Load setting model and load settings
       /* $this->load->model('settings/mdl_settings');
        $this->mdl_settings->load_settings();
		*/
       /* $this->lang->load('fi', '');    */

        $this->load->helper('language'); 
          
        $this->load->module('layout');
        
		
    }

}

?>
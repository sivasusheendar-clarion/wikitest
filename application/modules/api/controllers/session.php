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

class Session extends Base_Controller {

    // public $ajax_controller = TRUE;

    public function login() {
        $user_id = $this->input->get('user_id');
        $client_name = $this->input->get('password');
        $email = 'sujeeshvpclarion@gmail.com';

        $this->load->model('sessions/mdl_sessions');
        if ($this->mdl_sessions->auth($email, $password = 'clarion')) {
            $result['code'] = 200;
        } else {
            $result['code'] = 500;
            $result['msg'] = 'Invalid Email or Password';
        }

        echo json_encode($result);
        exit;
    }

}

?>
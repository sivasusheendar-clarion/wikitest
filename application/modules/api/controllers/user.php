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

class User extends Base_Controller {

    //  public $ajax_controller = TRUE;

    public function login() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        // $email =  'sujeeshvpclarion@gmail.com';

        $this->load->model('sessions/mdl_sessions');
        if ($this->mdl_sessions->auth($email, $password)) {
            $result['code'] = 200;
            $result['data'] = array('user_type' => $this->session->userdata('user_type'));
        } else {
            $result['code'] = 500;
            $result['msg'] = 'Invalid Email or Password';
        }

        echo json_encode($result);
        exit;
    }

    public function register($id = NULL) {

        $this->load->model('users/mdl_users');
        /* $data = array('email' => $this->input->post('email'),
          'password'=>  ''); */
        $this->mdl_users->run_validation(($id));

        if (empty($this->mdl_users->validation_errors)) {
            $data = array('email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
                'name' => $this->input->post('name')
            );

            $this->mdl_users->where('email', $data['email']);
            $user = $this->mdl_users->get('cb_users')->row();
            if (!empty($user) && $user->email == $data['email']) {
                $status['code'] = 500;
                $status['message'] = 'Email already exists';
                echo json_encode($status);
                exit;
            }


            $id = $this->mdl_users->save($id, $data);
            $status['code'] = 200;
            $status['message'] = 'Successfully registered';
            echo json_encode($status);
            exit;
        } else {
            $status['code'] = 500;
            $status['message'] = $this->mdl_users->validation_errors;
            echo json_encode($status);
            exit;
        }
    }

}

?>
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

class Users extends Base_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('mdl_users');
    }

    public function index($page = 0) {
        $this->mdl_users->paginate(site_url('users/index'), $page);
        $users = $this->mdl_users->result();

        $this->layout->set('users', $users);
        $this->layout->set('user_types', $this->mdl_users->user_types());
        $this->layout->buffer('content', 'users/index');
        $this->layout->render();
    }

    public function profile($id = NULL) {

        if (!$this->input->post('data')) {
            $user = $this->mdl_users->getById($this->session->userdata('user_id'));
            if ($user) {
                foreach ($user as $key => $val) {

                    $this->mdl_users->set_form_value('data[' . $key . ']', $val);
                }
            }
        } else if ($this->input->post('data')) {

            $data = $this->input->post('data');
            $id = $this->mdl_users->save($id, $data);

            if ($id) {
                $this->session->set_flashdata('message', 'Successfully Edited!!!');
            } else {
                $this->session->set_flashdata('message', 'Not Edited!!!');
            }
            redirect('/users/profile');
        }
        $this->layout->set(array('user' => $user));
        $this->layout->buffer('content', 'users/profile');
        $this->layout->render();
    }

    public function register($id = NULL) {
        if ($this->input->post('btn_cancel')) {
            redirect('users');
        }

        if ($this->mdl_users->run_validation(($id) ? 'validation_rules_existing' : 'validation_rules')) {
            $id = $this->mdl_users->save($id);

            $this->load->model('custom_fields/mdl_user_custom');

            $this->mdl_user_custom->save_custom($id, $this->input->post('custom'));

            redirect('users');
        }

        if ($id and !$this->input->post('btn_submit')) {
            if (!$this->mdl_users->prep_form($id)) {
                show_404();
            }

            $this->load->model('custom_fields/mdl_user_custom');

            $user_custom = $this->mdl_user_custom->where('user_id', $id)->get();

            if ($user_custom->num_rows()) {
                $user_custom = $user_custom->row();

                unset($user_custom->user_id, $user_custom->user_custom_id);

                foreach ($user_custom as $key => $val) {
                    $this->mdl_users->set_form_value('custom[' . $key . ']', $val);
                }
            }
        } elseif ($this->input->post('btn_submit')) {
            if ($this->input->post('custom')) {
                foreach ($this->input->post('custom') as $key => $val) {
                    $this->mdl_users->set_form_value('custom[' . $key . ']', $val);
                }
            }
        }

        $this->load->model('users/mdl_user_clients');
        $this->load->model('clients/mdl_clients');
        $this->load->model('custom_fields/mdl_custom_fields');

        $this->layout->set(
                array(
                    'id' => $id,
                    'user_types' => $this->mdl_users->user_types(),
                    'user_clients' => $this->mdl_user_clients->where('fi_user_clients.user_id', $id)->get()->result(),
                    'custom_fields' => $this->mdl_custom_fields->by_table('fi_user_custom')->get()->result()
                )
        );

        $this->layout->buffer('user_client_table', 'users/partial_user_client_table');
        $this->layout->buffer('modal_user_client', 'users/modal_user_client');
        $this->layout->buffer('content', 'users/form');
        $this->layout->render();
    }

    public function change_password($user_id) {
        if ($this->input->post('btn_cancel')) {
            redirect('users');
        }

        if ($this->mdl_users->run_validation('validation_rules_change_password')) {
            $this->mdl_users->save_change_password($user_id, $this->input->post('user_password'));
       
            redirect('/users/profile/');
        }

        $this->layout->buffer('content', 'users/form_change_password');
        $this->layout->render();
    }

    public function delete($id) {
        if ($id <> 1) {
            $this->mdl_users->delete($id);
        }
        redirect('users');
    }

    public function delete_user_client($user_id, $user_client_id) {
        $this->load->model('mdl_user_clients');

        $this->mdl_user_clients->delete($user_client_id);

        redirect('users/form/' . $user_id);
    }

    public function logout() {
        $this->session->sess_destroy();

        // redirect('/index.php');
    }

    public function forgot_pass() {

        if ($this->input->post('data')) {

            $data = $this->input->post('data');
            $user = $this->mdl_users->getByEmail($data['email']);
            $this->layout->set(array('user' => $user));
            $token = 'xyz';
            // token gene algorithm can change
            // token link can send in mail
            $this->layout->set(array('token' => $token));
            $this->mdl_users->save($user->id, array('token' => $token));

            $this->layout->buffer('content', 'users/forgot_pass');
        } else {
            $this->layout->buffer('content', 'users/forgot_pass');
        }

        $this->layout->render();
    }

    public function new_pass() {

        if ($this->input->post('data')) {

            $data = $this->input->post('data');

            if ($data['password'] == $data['confirm_password']) {
                $user = $this->mdl_users->getByToken($data['token']);
                
                
                if ($this->mdl_users->run_validation('validation_rules_change_password')) {
                        $this->mdl_users->save_change_password($user->id, $this->input->post('user_password'));
                }
                
            }
            redirect('users/new_pass');
        } else {
            $token = $this->input->get('token');
            $this->layout->set(array('token' => $token));
        }

        $this->layout->buffer('content', 'users/new_pass');

        $this->layout->render();
    }
}
?>
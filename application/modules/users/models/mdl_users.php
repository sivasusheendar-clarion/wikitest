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

class Mdl_Users extends Response_Model {

    public $table = 'cb_users';
    public $primary_key = 'cb_users.id';
    public $date_created_field = 'user_date_created';
    public $date_modified_field = 'user_date_modified';

    public function user_types() {
        return array(
            '1' => lang('administrator'),
            '2' => lang('guest_read_only')
        );
    }

    public function default_select() {
        // $this->db->select('SQL_CALC_FOUND_ROWS cb_user_custom.*, cb_users.*', FALSE);
    }

    public function default_join() {
        //$this->db->join('fi_user_custom', 'fi_user_custom.id = cb_users.id', 'left');
    }

    public function default_order_by() {
        //$this->db->order_by('cb_users.user_name');
    }

    public function validation_rules() {
        return array(
            'email' => array(
                'field' => 'email',
                'label' => lang('email'),
                'rules' => 'required|valid_email'
            ),
            'name' => array(
                'field' => 'name',
                'label' => lang('name'),
                'rules' => 'required'
            ),
            'password' => array(
                'field' => 'password',
                'label' => lang('password'),
                'rules' => 'required'
            ),
            'confirm_password' => array(
                'field' => 'confirm_password',
                'label' => lang('verify_password'),
                'rules' => 'required|matches[password]'
            ),
                /* 'user_address_1' => array(
                  'field' => 'user_address_1'
                  ),
                  'user_address_2' => array(
                  'field' => 'user_address_2'
                  ),
                  'user_city'      => array(
                  'field' => 'user_city'
                  ),
                  'user_state'     => array(
                  'field' => 'user_state'
                  ),
                  'user_zip'       => array(
                  'field' => 'user_zip'
                  ),
                  'user_country'   => array(
                  'field' => 'user_country'
                  ),
                  'user_phone'     => array(
                  'field' => 'user_phone'
                  ),
                  'user_fax'       => array(
                  'field' => 'user_fax'
                  ),
                  'user_mobile'    => array(
                  'field' => 'user_mobile'
                  ),
                  'user_web'       => array(
                  'field' => 'user_web'
                  ) */
        );
    }

    public function validation_rules_existing() {
        return array(
            'user_type' => array(
                'field' => 'user_type',
                'label' => lang('user_type'),
                'rules' => 'required'
            ),
            'user_email' => array(
                'field' => 'user_email',
                'label' => lang('email'),
                'rules' => 'required|valid_email'
            ),
            'user_name' => array(
                'field' => 'user_name',
                'label' => lang('name'),
                'rules' => 'required'
            ),
            'user_address_1' => array(
                'field' => 'user_address_1'
            ),
            'user_address_2' => array(
                'field' => 'user_address_2'
            ),
            'user_city' => array(
                'field' => 'user_city'
            ),
            'user_state' => array(
                'field' => 'user_state'
            ),
            'user_zip' => array(
                'field' => 'user_zip'
            ),
            'user_country' => array(
                'field' => 'user_country'
            ),
            'user_phone' => array(
                'field' => 'user_phone'
            ),
            'user_fax' => array(
                'field' => 'user_fax'
            ),
            'user_mobile' => array(
                'field' => 'user_mobile'
            ),
            'user_web' => array(
                'field' => 'user_web'
            )
        );
    }

    public function validation_rules_change_password() {
        return array(
            'user_password' => array(
                'field' => 'user_password',
                'label' => lang('password'),
                'rules' => 'required'
            ),
            'user_passwordv' => array(
                'field' => 'user_passwordv',
                'label' => lang('verify_password'),
                'rules' => 'required|matches[user_password]'
            )
        );
    }

    public function db_array() {
        $db_array = parent::db_array();

        if (isset($db_array['user_password'])) {
            unset($db_array['user_passwordv']);

            $this->load->library('crypt');

            $user_psalt = $this->crypt->salt();

            $db_array['user_psalt'] = $user_psalt;
            $db_array['user_password'] = $this->crypt->generate_password($db_array['user_password'], $user_psalt);
        }

        return $db_array;
    }

    public function save_change_password($id, $password) {
        $this->load->library('crypt');

        $user_psalt = $this->crypt->salt();
        $user_password = $this->crypt->generate_password($password, $user_psalt);

        $db_array = array(
            'user_psalt' => $user_psalt,
            'password' => $user_password
        );

        $this->db->where('id', $id);
        $this->db->update('cb_users', $db_array);

        $this->session->set_flashdata('alert_success', 'Password Successfully Changed');
    }

    public function save($id = NULL, $db_array = NULL) {

        $id = parent::save($id, $db_array);

        /* if ($user_clients = $this->session->userdata('user_clients'))
          {
          $this->load->model('users/mdl_user_clients');

          foreach ($user_clients as $user_client)
          {
          $this->mdl_user_clients->save(NULL, array('id'   => $id, 'client_id' => $user_client));
          }

          $this->session->unset_userdata('user_clients');
          } */

        return $id;
    }

    public function delete($id) {
        parent::delete($id);

        $this->load->helper('orphan');
        delete_orphans();
    }

    public function getById($id) {
        $this->db->where('id', $id);
        $data = $this->db->get('cb_users');
        if ($data)
            return $data->row();
    }

    public function getByEmail($email) {
        $this->db->where('email', $email);
        $data = $this->db->get('cb_users');
        if ($data)
            return $data->row();
    }

    public function getByToken($token) {
        $this->db->where('token', $token);
        $data = $this->db->get('cb_users');
        if ($data)
            return $data->row();
    }

}

?>
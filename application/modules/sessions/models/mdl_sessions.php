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

class Mdl_Sessions extends CI_Model {

    public function auth($email, $password) {
        $this->db->where('email', $email);

        $query = $this->db->get('cb_users');
        // echo "<pre>";print_r($this->db->last_query());exit;
        if ($query->num_rows()) {
            $user = $query->row();

            $this->load->library('crypt');



            /**
             * Password hashing changed after 1.2.0
             * Check to see if user has logged in since the password change
             */
            if (!$user->user_psalt) {
                /**
                 * The user has not logged in, so we're going to attempt to
                 * update their record with the updated hash
                 */
                // echo md5($password)." == ".$user->password;
                if (md5($password) == $user->password) {
                    /**
                     * The md5 login validated - let's update this user
                     * to the new hash
                     */
                    /*   $salt = $this->crypt->salt();
                      $hash = $this->crypt->generate_password($password, $salt);

                      $db_array = array(
                      'user_psalt'    => $salt,
                      'password' => $hash
                      );

                      $this->db->where('id', $user->id);
                      $this->db->update('cb_users', $db_array);

                      $this->db->where('email', $email);
                      $user = $this->db->get('cb_users')->row(); */
                } else {
                    /**
                     * The password didn't verify against original md5
                     */
                    return FALSE;
                }
            }
            //cho "<pre>$password : ";print_r(md5($password)." == ".$user->password );exit;
            //if ($this->crypt->check_password($user->user_password, $password))

            if ($user->user_psalt) {

                $user_password = $this->crypt->generate_password($password, $user->user_psalt);
                if ($user->password == $user_password) {
                    $session_data = array(
                        'user_type' => $user->type,
                        'user_id' => $user->id,
                        'user_name' => $user->name,
                        'user_admin' => $user->type ? 1 : 0
                    );

                    $this->session->set_userdata($session_data);

                    return TRUE;
                }
            } else {


                if (md5($password) == $user->password) {
                    $session_data = array(
                        'user_type' => $user->type,
                        'user_id' => $user->id,
                        'user_name' => $user->name,
                        'user_admin' => $user->type ? 1 : 0
                    );

                    $this->session->set_userdata($session_data);

                    return TRUE;
                }
            }
        }

        return FALSE;
    }

}

?>
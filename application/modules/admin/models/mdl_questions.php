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

class Mdl_Questions extends Response_Model {

    public $table               = 'cb_questions';
    public $primary_key         = 'cb_questions.id';
    public $date_created_field  = 'user_date_created';
    public $date_modified_field = 'user_date_modified';

    public function delete($id)
    {
        parent::delete($id);

        $this->load->helper('orphan');
        delete_orphans();
    }
    
    public function getById($id)
    {
        $this->db->where('id',$id);
        $data = $this->db->get('cb_questions');
        if($data)
            return $data->row();
          
    }
    public function save($id = NULL, $db_array = NULL)
    {
       
        $id = parent::save($id, $db_array);

        return $id;
    }

}

?>
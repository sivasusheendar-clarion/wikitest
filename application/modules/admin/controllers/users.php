<?php
Class Users extends Admin_Controller 
{
 public function __construct()
    {
        parent::__construct();
       
         $this->load->model('users/mdl_users');  
    }

    public function index($page = 0)
    {
        $this->mdl_users->paginate(site_url('users/index'), $page);
        $users = $this->mdl_users->result();
       
        $this->layout->set('users', $users);
        $this->layout->set('user_types', $this->mdl_users->user_types());
        $this->layout->buffer('content', 'admin/users/index');
        $this->layout->render();
    }
    public function edit($id = NULL)
    {
        

       /* if ($this->mdl_users->run_validation(($id) ? 'validation_rules_existing' : 'validation_rules'))
        {
            $id = $this->mdl_users->save($id);

            $this->load->model('custom_fields/mdl_user_custom');

            $this->mdl_user_custom->save_custom($id, $this->input->post('custom'));

            redirect('users');
        }   */
        
 
        if ($id and !$this->input->post('data'))
        {    
             $user = $this->mdl_users->getById($id);
             if($user) {
                foreach($user as $key=>$val) {
                    
                     $this->mdl_users->set_form_value('data['.$key.']' , $val);
                }  
             }
             
             $this->layout->set(array('user' => $user));
            
        }  else if($this->input->post('data')) {
              
             $data = $this->input->post('data'); 
             $id = $this->mdl_users->save($id,$data);
              
             if($id) {
                $this->session->set_flashdata('success', 'Successfully Edited!!!');
             }  else {
                $this->session->set_flashdata('error', 'Successfully Edited!!!');  
             }   
             redirect('/admin/users/edit/'.$id);
              
        } 
        
        $this->layout->buffer('content', 'admin/users/edit');
        $this->layout->render();
    }     
      
}
?>

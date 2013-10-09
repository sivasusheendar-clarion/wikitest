<?php

Class Questions extends Admin_Controller {

    public function __construct() {
        parent::__construct();

        $this->load->model('admin/mdl_questions');
    }

    public function index($page = 0) {
        $this->mdl_questions->paginate(site_url('questions/index'), $page);
        $questions = $this->mdl_questions->result();

        $this->layout->set('questions', $questions);

        $this->layout->buffer('content', 'admin/questions/index');
        $this->layout->render();
    }

    public function edit($id = NULL) {

        if ($id and !$this->input->post('data')) {
            
            $question = $this->mdl_questions->getById($id);
            
            if ($question) {
                foreach ($question as $key => $val) {

                    $this->mdl_questions->set_form_value('data[' . $key . ']', $val);
                }
            }

            $this->layout->set(array('question' => $question));
        } else if ($this->input->post('data')) {

            $data = $this->input->post('data');
            $id = $this->mdl_questions->save($id, $data);

            if ($id) {
                $this->session->set_flashdata('success', 'Successfully Edited!!!');
            } else {
                $this->session->set_flashdata('error', 'Successfully Edited!!!');
            }
            redirect('/admin/questions/edit/' . $id);
        }

        $this->layout->buffer('content', 'admin/questions/edit');
        $this->layout->render();
    }

}
?>

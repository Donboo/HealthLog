<?php

class Search extends CI_Controller {
    
    function index()
    {
        $this->load->library('form_validation');
        $this->load->helper(array('url', 'form'));  
        $data["main_content"] = 'search_view';
        $session_data = $this->session->userdata('loggedInfo');
        $data['username'] = $session_data['username'];
        $this->load->view('includes/template', $data);
    }
    
}

<?php

if ( ! defined('BASEPATH')) redirect(base_url());

class Insert extends CI_Controller {

    public function __construct() 
    {       
        parent:: __construct();
    }
    
    public function index() {
        $data["main_content"] = 'insert_view';
        if($this->session->userdata('loggedInfo')["CardCode"] == null || $this->session->userdata('loggedInfo')["AccountType"] != 1) redirect(base_url("login"));
        $session_data = $this->session->userdata('loggedInfo');
        $this->load->view('includes/template.php', $data);
        $this->load->helper(array('url', 'cache_expire'));
    }

    function _remap($method,$args)
    {
        if (method_exists($this, $method))
        {
           $this->$method($args);
        }
        else
        {
            $this->index($method,$args);
        }
    }
}
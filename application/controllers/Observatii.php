<?php

if ( ! defined('BASEPATH')) redirect(base_url());

class Observatii extends CI_Controller {

    public function __construct() 
    {       
        parent:: __construct();
        if (!is_cache_valid(md5('observatii'), 1800)){
            $this->db->cache_delete('observatii');
            $this->db->cache_delete(md5('observatii'));
        }
    }
    
    public function index() {
        $data["main_content"] = 'observatii_view';
        if($this->session->userdata('loggedInfo')["CardCode"] == null) redirect(base_url("login"));
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
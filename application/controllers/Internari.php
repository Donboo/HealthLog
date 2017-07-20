<?php

if ( ! defined('BASEPATH')) redirect(base_url());

class Internari extends CI_Controller {

    public function __construct() 
    {       
        parent:: __construct();
        if (!is_cache_valid(md5('internari'), 1800)){
            $this->db->cache_delete('internari');
            $this->db->cache_delete(md5('internari'));
        }
    }
    
    public function index() {
        $data["main_content"] = 'internari_view';
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
    
    function setAnalize() {
        $date = $this->input->post('date');
        $contents = explode("-", $date);
        if(count($contents) == 3) {
            $query = $this->db->query("SELECT null FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.analyzes") . " WHERE `ReservedBy` = ? AND `Active` = 1 LIMIT 1", array(session('loggedInfo', 'CardCode')));
            
            if(!$query->num_rows()) {
                $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.analyzes") . " (`ReservedBy`, `Date`, `Active`) VALUES (?, ?, 1)", array(session('loggedInfo', 'CardCode'), $date));
                echo json_encode(array("valid" => 1));
            }
            else echo json_encode(array("valid" => 0));
        }
    }

}
<?php

if ( ! defined('BASEPATH')) redirect(base_url());

class Analize extends CI_Controller {

    public function __construct() 
    {       
        parent:: __construct();
        $this->load->model('analize_model','',TRUE);
        if (!is_cache_valid(md5('analize'), 1800)){
            $this->db->cache_delete('analize');
            $this->db->cache_delete(md5('analize'));
        }
    }
    
    public function index() {
        if($this->session->userdata('loggedInfo')["CardCode"] == null) redirect(base_url("login"));
        $session_data = $this->session->userdata('loggedInfo');

        
        if($this->analize_model->checkActive(session('loggedInfo', 'CardCode'))):
            $date = explode('-', $this->analize_model->selectorWhereActive(session('loggedInfo', 'CardCode'), "Date"));
            if($date[2] < date("d") && $date[1] >= date("m") && $date[0] >= date("Y")):
                $this->analize_model->expireSchedule(session('loggedInfo', 'CardCode'));
            endif;
        endif;
        
        $data["main_content"] = 'analize_view';
        
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

            if(!($this->analize_model->checkActive(session('loggedInfo', 'CardCode')))) {
                if($this->analize_model->insertAnalize(session('loggedInfo', 'CardCode'), $date))
                    echo json_encode(array("valid" => 1));
                else echo json_encode(array("valid" => 2));
            }
            else echo json_encode(array("valid" => 0));
        }
    }

}
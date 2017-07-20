<?php

if ( ! defined('BASEPATH')) redirect(base_url());

class Pacient extends CI_Controller {

    public function __construct() 
    {       
        parent:: __construct();
        if (!is_cache_valid(md5('pacient'), 1800)){
            $this->db->cache_delete('pacient');
            $this->db->cache_delete(md5('pacient'));
        }
        $this->load->model('user','',TRUE);
    }
    
    public function index() {
        $data["main_content"] = 'pacient_view';
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
    
    function InsertNote() {
        $cardCode = $this->input->post("cardCodePatient");
        if(!is_numeric($cardCode)) {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
        
        $exists = $this->user->codeExists($cardCode);
        if($exists) {
            $contents = $this->input->post("ckeditor");
            $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.notes") . " (`CardCode`, `ByDoctor`, `Notes`, `Date`) VALUES (?, ?, ?, ?)", array($cardCode, session("loggedInfo", "CardCode"), $contents, time()));
            $this->session->set_flashdata("success", "Ai inserat o observatie medicala pacientului " . $cardCode);
            redirect(base_url("Medic"));
        }
    }
    
    function InsertMedication() {
        $cardCode = $this->input->post("cardCodePatient");
        if(!is_numeric($cardCode)) {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
        
        $exists = $this->user->codeExists($cardCode);
        if($exists) {
            $contents = $this->input->post("medicatii");
            $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.medicatii") . " (`CardCode`, `DoctorCode`, `Product`, `Date`) VALUES (?, ?, ?, ?)", array($cardCode, session("loggedInfo", "CardCode"), $contents, time()));
            $this->session->set_flashdata("success", "Ai inserat o medicatie pacientului " . $cardCode);
            redirect(base_url("Medic"));
        }
    }
    
    function InsertArticle() {
        $titleRO = $this->input->post('articleTitleRO');
        $titleEN = $this->input->post('articleTitleEN');
        $contentsRO = $this->input->post('articolRO');
        $contentsEN = $this->input->post('articolEN');
        if(strlen($titleRO) > 1 && strlen($titleEN) > 1 && strlen($contentsRO) > 1 && strlen($contentsEN) > 1) {
            $config['upload_path']          = './assets/images/';
            $config['allowed_types']        = 'jpg|png';
            $config['max_size']             = 9555;
            $config['max_width']            = 1920;
            $config['max_height']           = 1080;

            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('userfile'))
            {
                $this->session->set_flashdata("error", $this->upload->display_errors());
                redirect(base_url("Medic"));
            }
            else
            {
                $upload_data = $this->upload->data();
                $fileName = $upload_data['file_name'];
                $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.healthguide") . " (`TitleRO`, `TitleEN`, `Content`, `ContentEN`, `Date`, `Photo`) VALUES (?, ?, ?, ?, ?, ?)", array($titleRO, $titleEN, $contentsRO, $contentsEN, time(), $fileName));
                $this->session->set_flashdata("success", "Ai publicat un articol HealthGuide.");
                $this->db->cache_delete('default');
                $this->db->cache_delete(md5('default'));
                redirect(base_url("Medic"));
            }
        }
    }
    
    function SearchCard() {
        $code = $this->input->post('codCard');
        if(!is_numeric($code)) {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
        
        $exists = $this->user->codeExists($code);
        if($exists) {
            redirect(base_url("Pacient/" . $code));   
        }
    }
}
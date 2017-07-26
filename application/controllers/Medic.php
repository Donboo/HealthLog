<?php

if ( ! defined('BASEPATH')) redirect(base_url());

class Medic extends CI_Controller {

    public function __construct() 
    {       
        parent:: __construct();
        if (!is_cache_valid(md5('medic'), 1800)){
            $this->db->cache_delete('medic');
            $this->db->cache_delete(md5('medic'));
        }
        $this->load->model('user','',TRUE);
        $this->load->model('medic_model','',TRUE);
    }
    
    public function index() {
        $data["main_content"] = 'medic_view';
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
        
        if($this->user->codeExists($cardCode)) {
            $contents = $this->input->post("ckeditor");
            $this->medic_model->insertNote($cardCode, session("loggedInfo", "CardCode"), $contents);
            $this->session->set_flashdata("success", "Ai inserat o observatie medicala pacientului " . get_info("Name", $this->config->item("web_table_prefix") . $this->config->item("web_table.users"), "CardCode", $cardCode) . " (" . $cardCode . ")");
            redirect(base_url("Medic"));
        }
        else {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
    }
    
    function StopHospitalization() {
        $cardCode = $this->input->post("cardCodePatient");
        if(!is_numeric($cardCode)) {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
        
        if($this->user->codeExists($cardCode)) {
            $id = $this->input->post("rowID");
            $this->medic_model->stopHospitalization($cardCode, $id);
            $this->session->set_flashdata("success", "Ai externat pacientul " . get_info("Name", $this->config->item("web_table_prefix") . $this->config->item("web_table.users"), "CardCode", $cardCode) . " (" . $cardCode . ")");
            redirect(base_url("Medic"));
        }
        else {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
    }
    
    function InsertHospitalization() {
        $cardCode = $this->input->post("cardCodePatient");
        if(!is_numeric($cardCode)) {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
        
        if($this->user->codeExists($cardCode)) {
            $contents = $this->input->post("internari");
            $this->medic_model->insertHospitalization($cardCode, session("loggedInfo", "CardCode"), $contents);
            $this->session->set_flashdata("success", "Ai inserat o internare pacientului " . get_info("Name", $this->config->item("web_table_prefix") . $this->config->item("web_table.users"), "CardCode", $cardCode) . " (" . $cardCode . ")");
            redirect(base_url("Medic"));
        }
        else {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
    }
    
    function InsertRecomandation() {
        $cardCode = $this->input->post("cardCodePatient");
        if(!is_numeric($cardCode)) {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
        
        if($this->user->codeExists($cardCode)) {
            $contents = $this->input->post("recomandari");
            $this->medic_model->insertRecomandation($cardCode, session("loggedInfo", "CardCode"), $contents);
            $this->session->set_flashdata("success", "Ai inserat o recomandare pacientului " . get_info("Name", $this->config->item("web_table_prefix") . $this->config->item("web_table.users"), "CardCode", $cardCode) . " (" . $cardCode . ")");
            redirect(base_url("Medic"));
        }
        else {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
    }    
        
    function InsertMedication() {
        $cardCode = $this->input->post("cardCodePatient");
        if(!is_numeric($cardCode)) {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
    
        if($this->user->codeExists($cardCode)) {
            $contents = $this->input->post("medicatii");
            $this->medic_model->insertMedication($cardCode, session("loggedInfo", "CardCode"), $contents);
            $this->session->set_flashdata("success", "Ai inserat o medicatie pacientului " . get_info("Name", $this->config->item("web_table_prefix") . $this->config->item("web_table.users"), "CardCode", $cardCode) . " (" . $cardCode . ")");
            redirect(base_url("Medic"));
        }
        else {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
    }
    
    function InsertDiagnosis() {
        $cardCode = $this->input->post("cardCodePatient");
        if(!is_numeric($cardCode)) {
            $this->session->set_flashdata("error", "Pacient inexistent.");
            redirect(base_url("Medic"));
        }
        
        if($this->user->codeExists($cardCode)) {
            $contents = $this->input->post("diagnosis");
            $this->medic_model->insertDiagnosis($cardCode, session("loggedInfo", "CardCode"), $contents);
            $this->session->set_flashdata("success", "Ai inserat un diagnostic pacientului " . get_info("Name", $this->config->item("web_table_prefix") . $this->config->item("web_table.users"), "CardCode", $cardCode) . " (" . $cardCode . ")");
            redirect(base_url("Medic"));
        }
        else {
            $this->session->set_flashdata("error", "Pacient inexistent.");
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
                $this->medic_model->insertArticle($titleRO, $titleEN, $contentsRO, $contentsEN, $fileName);
                $this->session->set_flashdata("success", "Ai publicat un articol HealthGuide.");
                $this->db->cache_delete('default');
                $this->db->cache_delete(md5('default'));
                redirect(base_url("Medic"));
            }
        }
    }
    
    function searchUser() {
        $code = $this->input->post('codCard');
        if($this->user->codeExists($code)) {   
            $eok = explode(',', $this->medic_model->searchUser($code, "Location"));
            echo json_encode(array("valid" => 1, "name" => $this->medic_model->searchUser($code, "Name"), "byear" => $this->medic_model->searchUser($code, "BirthYear"), "where" => $eok["1"].", ".$eok["2"]));
        }      
        else echo json_encode(array("valid" => 0));
    }
    
}
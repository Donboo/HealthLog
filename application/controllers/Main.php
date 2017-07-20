<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {
    
    function index()
    {
        $data["main_content"] = 'main_view';
        if($this->session->userdata('loggedInfo')["CardCode"] == null) redirect(base_url("login"));
        $session_data = $this->session->userdata('loggedInfo');
        $data['username'] = $session_data['Name'];
        $this->load->view('includes/template.php', ($data));
        if (!is_cache_valid(md5('default'), 300)){
            $this->db->cache_delete('default');
            $this->db->cache_delete(md5('default'));
        }
    }
    
     function logout()
     {
        $this->session->unset_userdata('loggedInfo');
        session_destroy();
        redirect('', 'refresh');
     }
    
    function changeLanguage() {
        $language = $this->input->post('language');
        switch($language) {
            default: {
                $this->session->unset_userdata('userPreferences');
                $uP = array(
                    'Language' => 1
                );
                $this->session->set_userdata('userPreferences', $uP);
                echo json_encode(array("valid" => 1));
                break;
            }
            case 1: {
                $this->session->unset_userdata('userPreferences');
                $uP = array(
                    'Language' => 1
                );
                $this->session->set_userdata('userPreferences', $uP);
                echo json_encode(array("valid" => 1));
                break;
            }
            case 2: {
                $uP = array(
                    'Language' => 2
                );
                $this->session->set_userdata('userPreferences', $uP);
                echo json_encode(array("valid" => 1));
                break;
            }
        }
    }
}

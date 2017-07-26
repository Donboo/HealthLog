<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Medic_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function insertNote($cardCode, $byDoctor, $contents) {        
        $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.notes") . " (`CardCode`, `ByDoctor`, `Notes`, `Date`) VALUES (?, ?, ?, ?)", array($cardCode, $byDoctor, $contents, time()));
    }
    
    function insertRecomandation($cardCode, $byDoctor, $contents) {        
        $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.recomandations") . " (`CardCode`, `DoctorCode`, `Recomandation`, `Date`) VALUES (?, ?, ?, ?)", array($cardCode, $byDoctor, $contents, time()));
    }       
    
    function insertMedication($cardCode, $byDoctor, $contents) {
        $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.medicatii") . " (`CardCode`, `DoctorCode`, `Product`, `Date`) VALUES (?, ?, ?, ?)", array($cardCode, $byDoctor, $contents, time()));
    }
    
    function insertDiagnosis($cardCode, $byDoctor, $contents) {
        $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.diagnostics") . " (`CardCode`, `DoctorCode`, `Diagnostic`, `Hospital`, `Date`) VALUES (?, ?, ?, 1, ?)", array($cardCode, $byDoctor, $contents, time()));
    }
    
    function insertHospitalization($cardCode, $byDoctor, $contents) {
        $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.hospitalizations") . " (`CardCode`, `DoctorCode`, `Reason`, `Hospital`, `StartDate`, `StopDate`) VALUES (?, ?, ?, 1, ?, ?)", array($cardCode, $byDoctor, $contents, time(), time()));
    }
    
    function stopHospitalization($cardCode, $id) {
        $this->db->query("UPDATE " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.hospitalizations") . " SET `StopDate` = ? WHERE `ID` = ? LIMIT 1", array(time(), $id));
    }
    
    function insertArticle($titleRO, $titleEN, $contentsRO, $contentsEN, $fileName) {
        $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.healthguide") . " (`TitleRO`, `TitleEN`, `Content`, `ContentEN`, `Date`, `Photo`) VALUES (?, ?, ?, ?, ?, ?)", array($titleRO, $titleEN, $contentsRO, $contentsEN, time(), $fileName));
    }
    
    function searchUser($cardCode, $selector) {
        $query = $this->db->query("SELECT $selector FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.users") . " WHERE CardCode = ? LIMIT 1", array($cardCode));
        if($query->num_rows()) {
            return $query->result()[0]->$selector;
        }
        else return false;
    }
}

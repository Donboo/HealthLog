<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Analize_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    function checkActive($cardCode) {
        $query = $this->db->query("SELECT null FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.analyzes") . " WHERE `ReservedBy` = ? AND `Active` = 1 LIMIT 1", array($cardCode));
        if($query->num_rows()) return true; else return false;   
    }
    
    function insertAnalize($cardCode, $date) {
        $date2 = explode('-', $date);
        if(($date2[0]+$date2[1]+$date2[2]) > (date("Y")+date("m")+date("d"))) {
            $this->db->query("INSERT INTO " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.analyzes") . " (`ReservedBy`, `Date`, `Active`) VALUES (?, ?, 1)", array($cardCode, $date));
            return true;
        }
        else return false;
    }
    
    function selectorWhereActive($cardCode, $selector = "Date") {
        $query = $this->db->query("SELECT $selector FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.analyzes") . " WHERE `ReservedBy` = ? AND `Active` = 1 LIMIT 1", array($cardCode));
        if($query->num_rows()) return $query->result()[0]->$selector;
        else return false;
    }
    
    function expireSchedule($cardCode) {
        $query = $this->db->query("UPDATE " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.analyzes") . " SET `Active` = 0 WHERE `ReservedBy` = ? AND `Active` = 1 LIMIT 1", array($cardCode));
    }
    
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
	function verifyPassword($password, $hash) {	
		return password_verify($password, $hash);
	}
    
    
    function codeExists($code) {
        $query = $this->db->query("SELECT null FROM " . $this->config->item("web_table_prefix") . $this->config->item("web_table.users") . " WHERE `CardCode` = ? LIMIT 1", array($code));

        if($query->num_rows() > 0)
        {
            return 1;
        }
        else
        {
            return 0;
        }
    }
    
    function userExists($cardcode, $password) {      
        $query = $this->db->query("SELECT ID, Name, BirthYear, AccountType FROM " . $this->config->item("web_table_prefix") . $this->config->item("web_table.users") . " WHERE `CardCode` = ? AND `Password` = ? LIMIT 1", array($cardcode, hash("sha256", "mOGhbVyt!4JkL".$password."44EkVoKnLo")));
        
        if($query -> num_rows())
        {
            foreach ($query->result() as $row) {
                $loginSession = array(
                    'ID' => $row->ID,
                    'Name' => $row->Name,
                    'CardCode' => $cardcode,
                    'AccountType' => $row->AccountType,
                    'BirthYear' => $row->BirthYear
                );
                $this->session->set_userdata('loggedInfo', $loginSession);
            }
            return 1;
        }
        else
        {
            return false;
        }
    }
    
    function createUser($username, $email, $password) {
		
		$data = array(
			'Name'       => $username,
            'CardCode'   => $cardcode,
			'Password'   => hash("sha256", "mOGhbVyt!4JkL".$password."44EkVoKnLo"),
			'Since' => time(),
		);
		
		return $this->db->insert($this->config->item("web_table_prefix") . $this->config->item("web_table.users"), $data);
		
	}
}

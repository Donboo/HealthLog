<?php
function convertTimestampToDate($timestamp)
{
    echo date("d-m-Y H:i:s", $timestamp);
}


/*function compressHTML($source)
{
    return str_replace(" ", "", preg_match("/\>(.*?)\</", $source));
}*/

function translate($RO, $EN) {
    $ci =& get_instance();
    if($ci->session->userdata('userPreferences')["Language"] === null) return $RO;
    if($ci->session->userdata('userPreferences')["Language"] == 1)
        return $RO;
    elseif($ci->session->userdata('userPreferences')["Language"] == 2)
        return $EN;
    else
        return $RO;
}

function get_info($selector, $table, $firstkey, $key, $extra = "LIMIT 1") {
    $ci =& get_instance();
    $query = $ci->db->query("SELECT `".$selector."` FROM `".$table."` WHERE `".$firstkey."` = '".$key."' $extra");
    return (isset($query->result()[0]->$selector) ? $query->result()[0]->$selector: "Unknown");
}


function getUserData($cardCode, $data = "Name") {
    $ci =& get_instance();

    $query = $ci->db->query("SELECT $data FROM " . $ci->config->item("web_table_prefix") . $ci->config->item("web_table.users") . " WHERE `CardCode` = ? LIMIT 1", array($cardCode));

    return (isset($query->result()[0]->$data) ? $query->result()[0]->$data: "Unknown");
}

function session($name, $memberOfArray) {
    $ci =& get_instance();
    if(isset($name[1]) && isset($memberOfArray[1])) {
        return $ci->session->userdata("$name")["$memberOfArray"];
    }
} 

function countTable($table, $extra = "") {
    $ci =& get_instance();
    $query = $ci->db->query("SELECT COUNT(*) FROM `" . $table . "` " . $extra);
    return $query->num_rows();
}


function base64Encoded($data)
{
    if (preg_match('%^[a-zA-Z0-9/+]*={0,2}$%', $data)) {
       return TRUE;
    } else {
       return FALSE;
    }
}

function getHospitalByCounty($county) {
    if(!is_numeric($county) || $county < 1 || $county > 41) return "#";
    switch($county)
    {
        case 1:
        {
            return "Spitalul Județean de Urgență Alba Iulia";
        }
        case 2:
        {
            return "Spitalul Clinic Judeţean de Urgenţă Arad";
        }
        case 3:
        {
            return "Spitalul Județean de Urgență Argeș";
        }
        case 4:
        {
            return "Spitalul Județean de Urgență Bacău";
        }
        case 5:
        {
            return "Spitalul Clinic Judeţean de Urgenţă Oradea";
        }
        case 6:
        {
            return "Spitalul Judetean de Urgenta Bistrita";
        }
        case 7:
        {
            return 'Spitalul Județean de Urgențe "Mavromati" Botoșani';
        }
        case 8:
        {
            return "Spitalul Clinic Județean de Urgență Brașov";
        }
        case 9:
        {
            return "Spitalul Județean de Urgență Brăila";
        }
        case 10:
        {
            return "Spitalul Judeţean de Urgenţă Buzău";
        }
        case 11:
        {
            return "Spitalul Judeţean de Urgenţă Reşiţa";
        }
        case 12:
        {
            return "Spitalul Clinic Județean de Urgență Cluj-Napoca";
        }
        case 13:
        {
            return "Spitalul Clinic Județean de Urgență Constanța";
        }
        case 14:
        {
            return "Spitalul Județean de Urgență Fogolyán Kristóf";
        }
        case 15:
        {
            return "Spitalul Judeţean de Urgență Târgoviște";
        }  
    }
    
    function config($item) {
        return $this->config->item($item);
    }
}
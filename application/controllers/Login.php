<?php
 
class Login extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->model('user','',TRUE);
    }

    function index()
    {
        $this->load->library('form_validation');

        $contentForbidden = file_get_contents('./application/logs/IPs.txt', FILE_USE_INCLUDE_PATH);
        $IPs = explode('|', $contentForbidden);
        foreach($IPs as $IP)
        {
            $lol = explode('-', $IP);
            if(!strcmp($lol[0], $this->input->ip_address()))
            {
                if(time() - strval($lol[1]) < 1)
                    die("Accesul ti-a fost interzis pentru 15 minute.");
                else {
                    $content = str_replace($contentForbidden, "", $IP);
                    file_put_contents('./application/logs/IPs.txt', $content);
                    unset($_SESSION["breakTries"]);
                }
            }
        }
        
        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

        if($this->form_validation->run() == FALSE)
        {
            $data["main_content"] = 'login_view';
            $this->load->view('includes/template.php', $data);
        }
        else
        {
            redirect('', 'refresh');
        }
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
    
    function stepCode() {
        $code = $this->input->post('code');
        $exists = $this->user->codeExists($code);
        if($exists){
            unset($_SESSION["breakTries"]);
            $loginSession = array(
                'CardCode' => $code,
                'step' => 2
            );
            $this->session->set_userdata('loginSession', $loginSession);
            
            echo json_encode(array("valid" => 1));
        }
        else {
            if(!isset($_SESSION["breakTries"])) $_SESSION["breakTries"] = 1;
            elseif(isset($_SESSION["breakTries"])) 
            {
                $_SESSION["breakTries"] += 1;
                if($_SESSION["breakTries"] == 5) {
                    echo json_encode(array("valid" => 0, "errorMessage" => "Codul de card nu exista. Accesul la autentificare ti-a fost restrictionat pentru 15 minute."));
                    $file = './application/logs/IPs.txt';
                    $handle = fopen($file, 'a') or exit;
                    $content = $this->input->ip_address() . "-" . time() . "|";
                    fwrite($handle, $content);
                }
                elseif($_SESSION["breakTries"] >= 5) {
                    echo json_encode(array("valid" => 0, "errorMessage" => "Codul de card nu exista. Accesul la autentificare ti-a fost restrictionat."));
                }
                else
                    echo json_encode(array("valid" => 0, "errorMessage" => "Codul de card nu exista. Mai ai " . (5 - intval($_SESSION["breakTries"])) . " incercari de autentificare pana iti vom bloca temporar accesul la site."));
            }
         }
     }
    
    function stepPassword() {
        $password = $this->input->post('passwordeanu');
        $exists = $this->user->userExists($this->session->userdata('loginSession')["CardCode"], $password);
        if($exists){
            unset($_SESSION["loginTries"]);
            echo json_encode(array("valid" => 1));
        }
        else {
            if(!isset($_SESSION["loginTries"])) $_SESSION["loginTries"] = 1;
            elseif(isset($_SESSION["loginTries"])) 
            {
                $_SESSION["loginTries"] += 1;
                if($_SESSION["loginTries"] < 3) echo json_encode(array("valid" => 0, "errorMessage" => "Parola nu corespunde codului de card. Mai ai " . (3 - intval($_SESSION["loginTries"])) . " incercari de autentificare pana iti vom bloca temporar accesul la cont."));
                elseif($_SESSION["loginTries"] == 3) {
                    
                    $getloc = json_decode(file_get_contents("http://ipinfo.io/"));
                    
                    $emailContents = 
                        '<div style="height:300px;width:600px;background: #F5F5F5;font-family: Arial, Helvetica, sans-serif;">
                            <div style="width: 100%; height: 40px; background: #D54444;">
                                <a href="' . base_url() . '" style="text-decoration:none;display:block;color: #fff; margin-top: 10px; margin-left: 10px; position: absolute; font-weight: bold;">HEALTHLOG</a>
                            </div>
                            <div style="margin:auto;">
                                <h1 style="font-size:25px">
                                    Cineva a încercat să îți acceseze contul!
                                </h1>
                                <span style="color: #000">Data: ' . date("d-m-Y H:i") . '</span><br>
                                <span style="color: #000">Locația: ' .  $getloc->city . '</span><br>
                                <span style="color: #000">Browser: ' . $this->agent->browser() . '</span><br>
                                <span style="color: #000">IP: ' . $this->input->ip_address() . '</span><br>
                                <span style="color: #000">OS: ' . $this->agent->platform() . '</span><br><br>
                                <span style="color: #000">Dacă nu ai fost tu, accesează urmatorul link:</span><br>
                                <a href="' . base_url('security/changepassword') . '">' . base_url('security/changepassword') . '</a>
                            </div>
                        </div>
                        ';
                    
                    $this->load->library('email');

                    $this->email->from('security@healthlog.ro', 'HealthLog');
                    
                    $this->email->to('someone@example.com');

                    $this->email->subject('Cineva a incercat sa iti acceseze contul HealthLog!');
                    $this->email->message($emailContents);

                    $this->email->send();
                    
                    echo json_encode(array("valid" => 0, "errorMessage" => "Parola nu corespunde codului de card. Accesul la cont a fost restrictionat."));
                    unset($_SESSION["loginTries"]);
                }
                else
                    echo json_encode(array("valid" => 0, "errorMessage" => "Parola nu corespunde codului de card. Accesul la cont a fost restrictionat."));
            }
         }
     }
}
?>
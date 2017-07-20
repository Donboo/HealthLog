<?php
$this -> session -> sess_destroy();
$this -> session -> set_userdata("language", 1);
redirect(base_url());
?>

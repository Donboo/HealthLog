<?php

   if($this->uri->segment(2))
   {
       $redirect = htmlentities($this->uri->segment(2));
    
       $query = "SELECT `RedirectsTo` FROM `panel_shortcuts` WHERE `Shortcut` = ?";
       $question = $this -> db -> query($query, array($redirect));
       if($question->num_rows()) {
            foreach($question->result() as $row):
                $redirectsTo = $row->RedirectsTo;
            endforeach; 
            redirect($redirectsTo);
       }
       else redirect(base_url());
   }
   else redirect(base_url());
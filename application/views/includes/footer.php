            
            <?php if(!in_array($this->uri->segment(1), array("", "main", "login"))) echo '<a id="homeDirect" href="' . base_url() . '">' . translate("Acasă", "Home") . '</a>'; ?>
            <div id="cardShow" class="mdl-js-snackbar mdl-snackbar">
                <div class="mdl-snackbar__text"></div>
                <button class="mdl-snackbar__action" type="button"></button>
            </div>
            <div class="footer">
                <hr>
                <span><?php echo translate("HealthLog oferit și în:", "HealthLog offered in:"); ?></span>
                <ul>
                    <li><a href="#" id="langRo"><?php echo translate("Română", "Romanian"); ?></a></li>
                    <li><a href="#" id="langEn"><?php echo translate("Engleză", "English"); ?></a></li>
                </ul>
            </div>
            <script defer>
                $(document).ready(function(){
                    $("#langRo").on('click', function(e) {
                        e.preventDefault();    
                        var data = {
                            'language' : 1,   
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url()?>Main/changeLanguage/",
                            dataType: "json",
                            data: data,                  
                            success: function(data){
                                if(data.valid){
                                    window.setTimeout(function(){location.reload()},3000);
                                }else{
                                    
                                }
                            }
                        });
                   });
                    
                    $("#langEn").on('click', function(e) {
                        e.preventDefault();    
                        var data = {
                            'language' : 2,   
                            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                        };
                        $.ajax({
                            type: "POST",
                            url: "<?php echo base_url()?>Main/changeLanguage/",
                            dataType: "json",
                            data: data,                  
                            success: function(data){
                                if(data.valid){
                                    window.setTimeout(function(){location.reload()},3000);
                                }else{
                                    
                                }
                            }
                        });
                    });
                });
                function responsive() {
                    var x = document.getElementById("hMenu");
                    if (x.className === "hHeader") {
                        x.className += " responsive";
                    } else {
                        x.className = "hHeader";
                    }
                } 
            </script>
        </main>
    </div>
    <script src="<?php echo base_url("assets/js/main.js"); ?>"></script>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <?php
        if(!strcmp($this->uri->segment(1), "analize")) {
            echo "<script src='" . base_url("assets/js/jquery-ui.min.js") . "'></script>";
            echo "<script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>";
            echo "<script src='" . base_url("assets/js/fullcalendar.min.js") . "'></script>";
            echo "<link rel='stylesheet' href='https://fullcalendar.io/js/fullcalendar-3.4.0/fullcalendar.min.css'>";
        }
    ?>
    </body>
</html>
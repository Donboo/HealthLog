    <div class="mdl-grid f028HL">
        <ul style="position:fixed;">
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand" style="background:#4CAF50;">
                    <h2 class="mdl-card__title-text"><?php echo translate("Istoric internări", "Hospitalizations historic"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;left: 226px;">local_hospital</i></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php echo translate("Apasă pe butonul de mai jos pentru a vedea istoricul internărilor.", "Click the button below in order to see hospitalizations historic."); ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="<?php echo base_url("internari/" . session("loggedInfo", "CardCode")); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        <?php echo translate("INTERNĂRI", "HOSPITALIZATIONS"); ?>
                    </a>
                </div>
            </div>
            <br>
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand" style="background:#F3645A">
                    <h2 class="mdl-card__title-text"><?php echo translate("Medicații", "Medications"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;left: 226px;">colorize</i></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php echo translate("Pentru a-ți vedea medicațiile, apasă pe butonul de mai jos.", "In order to view your medications, click on the button above."); ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="<?php echo base_url("medicatii/" . session("loggedInfo", "CardCode")); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        <?php echo translate("MEDICAȚII", "MEDICATIONS"); ?>
                    </a>
                </div>
            </div>
            <br>
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand" style="background:#FF9800">
                    <h2 class="mdl-card__title-text"><?php echo translate("Recomandări", "Recomandations"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;left: 226px;">thumb_up</i></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php echo translate("Pentru a vedea recomandările din partea medicilor, apasă pe butonul de mai jos.", "In order to see medics' recomandations, click the button below."); ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="<?php echo base_url("recomandari/" . session("loggedInfo", "CardCode")); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        <?php echo translate("RECOMANDĂRI", "RECOMANDATIONS"); ?>
                    </a>
                </div>
            </div>
        </ul>
        
       
        <div id="healthDIV">
            <h2 class="mdl-card__title-text" style="margin-left: auto;margin-right: auto;margin-top: 0.5%;"><?php echo translate("Ghid de sănătate", "Health guide"); ?></h2>
            <hr>
            <div style="background: linear-gradient(#58A74C, #7ED472);color: #fff !important;margin-top: 1%;width: 100%;text-align: center;box-shadow: initial;border-radius: 0;" class=" demo-card-event mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand" style="color: #fff;">
                    <h4 style="margin: auto;">
                      Alergare
                        
                    <?php
                        $age = date("Y") - session("loggedInfo", "BirthYear");
                        if($age >= 8 && $age <= 10)
                            echo "15";
                        elseif($age >= 11 && $age <= 20)
                            echo "35";
                        elseif($age >= 21 && $age <= 69)
                            echo "30";
                        elseif($age >= 70)
                            echo "5";
                        
                        echo translate(" minute", " minutes");
                        ?>
                        
                        
                    </h4>
                </div>
            </div>
            
            <div style="background: linear-gradient(#C6524A, #F3645A);color: #fff !important;margin-top: 1%;width: 100%;text-align: center;box-shadow: initial;border-radius: 0;" class=" demo-card-event mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand" style="color: #fff;">
                    <h4 style="margin: auto;">
                        <?php 
                            $age = date("Y") - session("loggedInfo", "BirthYear");
                            if($age >= 8 && $age <= 10)
                                echo number_format(rand(12000,16000));
                            elseif($age >= 11 && $age <= 20)
                                echo number_format(rand(11000,12000));
                            elseif($age >= 21 && $age <= 69)
                                echo number_format(rand(7000,13000));
                            elseif($age >= 70)
                                echo number_format(rand(500,3000));
                        ?>
                        
                        <?php echo translate("de pași azi", "steps today"); ?><br>
                    </h4>
                </div>
            </div>
            
            <?php
                $this->db->cache_on();
                $query = $this->db->query("SELECT `ID`, `TitleRO`, `TitleEN`, `Photo` FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.healthguide") . " ORDER BY `ID` DESC LIMIT 15");
            
                if($query->num_rows()):
                    $count = 1;
                    foreach($query->result() as $row):
                    $count++;
                ?>
                <div style="background: url(<?php echo base_url("assets/images/" . $row->Photo . ""); ?>) no-repeat;color: #fff !important;margin-top: 1%;width: 100%;text-align: center;box-shadow: initial;border-radius: 0;background-size: 100%;" class=" demo-card-event mdl-card mdl-shadow--2dp">
                    <div class="healthguide"></div>
                    <a style="text-decoration:none; color:#fff;margin: auto;z-index:1" href="<?php echo base_url("healthguide/" . $row->ID); ?>">
                        <div class="mdl-card__title mdl-card--expand" style="color: #fff;">
                            <h4 style="background: rgba(14, 14, 14, 0.5);">
                                <?php echo translate($row->TitleRO, $row->TitleEN); ?><br>
                            </h4>
                        </div>
                    </a>
                </div>
                <?php endforeach; endif; ?>
        </div>
        
        <ul id="secondul" style="float:right;position: fixed;right: calc(100% - 87%);">
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand" style="background:#F36A87;">
                    <h2 class="mdl-card__title-text"><?php echo translate("Analize", "Analysis"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;left: 226px;">favorite</i></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php echo translate("Ultimul tău set de analize a fost efectuat pe data de " . get_info("Date", "web_analyzes", "ReservedBy", session("loggedInfo", "CardCode"), "ORDER BY ID Desc") . ". Apasă pe butonul de mai jos pentru a te programa pentru un set nou de analize. <a href='http://www.gandul.info/magazin/de-ce-e-bine-sa-iti-faci-analize-la-fiecare-inceput-de-an-7858420'>De ce este bine să îți faci un set de analize?</a>", "Your last analysis set was made on " . get_info("Date", "web_analyzes", "ReservedBy", session("loggedInfo", "CardCode"), "ORDER BY ID Desc") . ". Click on the button below to sign for a new health analysis set.<a href='#'>Why it is good to make a new analysis set?</a>"); ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="<?php echo base_url("analize/" . session("loggedInfo", "CardCode")); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        <?php echo translate("FĂ UN SET NOU DE ANALIZE", "CREATE A NEW ANALYSIS SET"); ?>
                    </a>
                </div>
            </div>
            <br>
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand" style="background:#6A9CF3">
                    <h2 class="mdl-card__title-text"><?php echo translate("Observații medicale", "Medical notes"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;left: 226px;">event_note</i></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php echo translate("Pentru a-ți vedea observațiile medicale, apasă pe butonul de mai jos.", "In order to view your medical notes, click on the button below."); ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="<?php echo base_url("observatii/" . session("loggedInfo", "CardCode")); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        <?php echo translate("OBSERVAȚII MEDICALE", "MEDICAL NOTES"); ?>
                    </a>
                </div>
            </div>
            <br>
            <div class="demo-card-square mdl-card mdl-shadow--2dp">
                <div class="mdl-card__title mdl-card--expand" style="background:#009688">
                    <h2 class="mdl-card__title-text"><?php echo translate("Diagnostice recente", "Recent diagnosis"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;left: 226px;">access_time</i></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <?php echo translate("Pentru a-ți vedea ultimele diagnostice, apasă pe butonul de mai jos.", "In order to view your last diagnosis, click on the button below."); ?>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="<?php echo base_url("diagnostice/" . session("loggedInfo", "CardCode")); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        <?php echo translate("DIAGNOSTICE RECENTE", "RECENT DIAGNOSIS"); ?>
                    </a>
                </div>
            </div>
        </ul>
    </div>
    <script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
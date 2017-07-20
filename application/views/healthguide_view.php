<?php 
    $articolID = $this->uri->segment(2);
    if(!is_numeric($articolID)) {
        $this->session->set_flashdata('error', "Articol invalid.");
        redirect(base_url());
    }

    $query = $this->db->query("SELECT null FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.healthguide") . " WHERE `ID` = ? LIMIT 1", array($articolID));
            
    if(!$query->num_rows())  {
        $this->session->set_flashdata('error', "Articol invalid.");
        redirect(base_url());
    }
?>
    <div class="mdl-grid f028HL">
        <?php
                $this->db->cache_on();
                $query = $this->db->query("SELECT `ID`, `TitleRO`, `TitleEN`, `Content`, `ContentEN`, `Photo` FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.healthguide") . " WHERE `ID` = ?", array($articolID));
    
                if($query->num_rows()):
                    foreach($query->result() as $row):
                ?>
                <div style="background: url(<?php echo base_url("assets/images/" . $row->Photo . ""); ?>) no-repeat;color: #fff !important;margin-top: 1%;width: 100%;text-align: center;box-shadow: initial;border-radius: 0;background-size: 100%; " class=" demo-card-event mdl-card mdl-shadow--2dp">
                    <div class="healthguide"></div>
                    <a style="text-decoration:none; color:#fff;margin: auto;z-index:1" href="<?php echo base_url("healthguide/" . $row->ID); ?>">
                        <div class="mdl-card__title mdl-card--expand" style="color: #fff;">
                            <h4 style="background: rgba(14, 14, 14, 0.5);">
                                <?php echo translate($row->TitleRO, $row->TitleEN); ?><br>
                            </h4>
                        </div>
                    </a>
                </div>
                <div class="mdl-shadow--2dp mdl-card__supporting-text" style="width:100%;">
                    <?= translate($row->Content, $row->ContentEN); ?>        
                </div>
                <?php endforeach; endif; ?>
    </div>
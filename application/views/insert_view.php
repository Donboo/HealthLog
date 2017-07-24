    <script src="<?php echo base_url("assets/plugins/ckeditor/ckeditor.js"); ?>"></script>
    <script src="<?= base_url("assets/plugins/ckeditor/adapters/jquery.js"); ?>"></script>
    <div class="mdl-grid f028HL">
        <h2 class="mdl-card__title-text" style="margin-left: auto;margin-right: auto;margin-top: 0.5%;">Dr. <?= session("loggedInfo", "Name"); ?> @ Medic Pan<?= translate("ou", "el"); ?></h2>
        <hr style="width:100%">
        <h2 class="mdl-card__title-text" style="margin-left: auto;margin-right: auto;margin-top: 0.5%;">Completezi dosarul medical al pacientului <?php echo getUserData($this->uri->segment(2), "Name"); ?></h2>
        <hr style="width:100%">
        
        
        
        <div class="1p demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;margin-top: 40px; ">
            <div class="mdl-card__title mdl-card--expand" style="background:#6A9CF3">
                <h2 class="mdl-card__title-text"><a class="toggle" data-numar="1" href="javascript:void(0);"><?php echo translate("Observații medicale", "Medical notes"); ?></a><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">event_note</i></h2>
            </div>
            <div id="1" data-position="0" class="inner mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/InsertNote/"); ?>
                    <input class="mdl-textfield__input" type="hidden" value="<?php echo $this->uri->segment(2); ?>" name="cardCodePatient" id="cardCodePatient">
                    <textarea name="ckeditor"></textarea>
                    <script>
                      CKEDITOR.replace( 'ckeditor' );
                    </script>
                <button onclick="return confirm('Esti sigur?')" type="submit" class="center mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">
                    <?php echo translate("ADAUGA", "ADD"); ?>
                    <span class="mdl-button__ripple-container">
                        <span class="mdl-ripple"></span>
                    </span>
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
        
        
        <div class="2p demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;margin-top:40px;">
            <div class="mdl-card__title mdl-card--expand" style="background:#F3645A">
                <h2 class="mdl-card__title-text"><a class="toggle" data-numar="2" href="javascript:void(0);"><?php echo translate("Medicații", "Medications"); ?></a><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">colorize</i></h2>
            </div>
            <div id="2" data-position="0" class="inner mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/InsertMedication/"); ?>
                    <input class="mdl-textfield__input" type="hidden" value="<?php echo $this->uri->segment(2); ?>" name="cardCodePatient" id="cardCodePatient">
                    <textarea name="medicatii"></textarea>
                    <script>
                      CKEDITOR.replace( 'medicatii' );
                    </script>
                <button onclick="return confirm('Esti sigur?')" type="submit" class="center mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">
                    <?php echo translate("ADAUGA", "ADD"); ?>
                    <span class="mdl-button__ripple-container">
                        <span class="mdl-ripple"></span>
                    </span>
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
        
        
        <div class="3p demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;margin-top:40px;">
            <div class="mdl-card__title mdl-card--expand" style="background:#FF9800">
                <h2 class="mdl-card__title-text"><a class="toggle" data-numar="3" href="javascript:void(0);"><?php echo translate("Recomandări", "Recomandations"); ?></a><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">thumb_up</i></h2>
            </div>
            <div id="3" data-position="0" class="inner mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/InsertRecomandation/"); ?>
                    <input class="mdl-textfield__input" type="hidden" value="<?php echo $this->uri->segment(2); ?>" name="cardCodePatient" id="cardCodePatient">
                    <textarea name="recomandari"></textarea>
                    <script>
                      CKEDITOR.replace( 'recomandari' );
                    </script>
                <button onclick="return confirm('Esti sigur?')" type="submit" class="center mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">
                    <?php echo translate("ADAUGA", "ADD"); ?>
                    <span class="mdl-button__ripple-container">
                        <span class="mdl-ripple"></span>
                    </span>
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
        
        <div class="4p demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;margin-top:40px;">
            <div class="mdl-card__title mdl-card--expand" style="background:#009688">
                <h2 class="mdl-card__title-text"><a class="toggle" data-numar="4" href="javascript:void(0);"><?php echo translate("Diagnostice recente", "Recent diagnostics"); ?></a><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">access_time</i></h2>
            </div>
            <div id="4" data-position="0" class="inner mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/InsertDiagnosis/"); ?>
                    <input class="mdl-textfield__input" type="hidden" value="<?php echo $this->uri->segment(2); ?>" name="cardCodePatient" id="cardCodePatient">
                    <textarea name="diagnosis"></textarea>
                    <script>
                      CKEDITOR.replace( 'diagnosis' );
                    </script>
                <button onclick="return confirm('Esti sigur?')" type="submit" class="center mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">
                    <?php echo translate("ADAUGA", "ADD"); ?>
                    <span class="mdl-button__ripple-container">
                        <span class="mdl-ripple"></span>
                    </span>
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
    
    </div>
<style>
    .toggle {
        color: #fff;
        text-decoration: none;
        font-weight: 100;
    }
</style>
<script>
$(document).ready(function(){    
    $(".inner").slideUp(350); 
    $(".demo-card-square").css("background", "transparent");
    $(".demo-card-square").not(':first').css("margin-top", "-40px");
    $(".mdl-shadow--2dp").css("box-shadow", "none");
});
    
$('.toggle').click(function(e) {
  	e.preventDefault();
  
    var nume = "#" + $(this).data("numar");
    var name = "." + $(this).data("numar") + "p";
    
    if($(nume).data('position') == 0) {
        $(nume).slideDown(350); 
        $(nume).data('position',1); // 0 - closed / 1 - open
        
        $(name).css("background-color", "#fff");
        $(name).not(':first').css("margin-top", "40px");
        $(name).css("margin-bottom", "80px");
        $(name).css("box-shadow", "0 2px 2px 0 rgba(0,0,0,.05),0 3px 1px -2px rgba(0,0,0,.08),0 1px 5px 0 rgba(0,0,0,.08)");
    }
    else if($(nume).data('position') == 1) {
        $(nume).slideUp(350); 
        $(nume).data('position',0); // 0 - closed / 1 - open
        
        $(name).css("background", "transparent");
        $(name).not(':first').css("margin-top", "-40px");
        $(name).css("margin-bottom", "0px");
        $(name).css("box-shadow", "none");
    }
});
</script>
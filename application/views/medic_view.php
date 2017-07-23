
    <script src="<?php echo base_url("assets/plugins/ckeditor/ckeditor.js"); ?>"></script>
    <script src="<?= base_url("assets/plugins/ckeditor/adapters/jquery.js"); ?>"></script>
    <div class="mdl-grid f028HL">
        <h2 class="mdl-card__title-text" style="margin-left: auto;margin-right: auto;margin-top: 0.5%;">Dr. <?= session("loggedInfo", "Name"); ?> @ Medic Pan<?= translate("ou", "el"); ?></h2>
        <hr style="width:100%">
        <div class="demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;">
            <div class="mdl-card__title mdl-card--expand" style="background:#62BA66">
                <h2 class="mdl-card__title-text"><?php echo translate("Caută pacient", "Search patient"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">search</i></h2>
            </div>
            <div id="innerCode" class="mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/SearchCard/", "id='haiAzi'"); ?>
                <div class="center mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label class="mdl-textfield__label">Card Code</label>
                    <input type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="codCard" name="codCard" class="mdl-textfield__input">
                    <span class="mdl-textfield__error">You have to insert a Card Code.</span>
                </div>
            </div>
            <div id="amZis"></div> 
            <div class="mdl-card__actions mdl-card--border">
                <button type="submit" class="center mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">
                    <?php echo translate("CAUTA", "SEARCH"); ?>
                    <span class="mdl-button__ripple-container">
                        <span class="mdl-ripple"></span>
                    </span>
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
        
        
        <div class="demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;margin-top:40px;">
            <div class="mdl-card__title mdl-card--expand" style="background:#F3826A">
                <h2 class="mdl-card__title-text"><?php echo translate("Adaugă articol HealthGuide", "Add a HealthGuide article"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">event_note</i></h2>
            </div>
            <div class="mdl-card__supporting-text" style="width:97%">
                <?php echo form_open_multipart('Medic/InsertArticle'); ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:97%">
                        <input class="mdl-textfield__input" type="text" name="articleTitleRO" id="articleTitleRO">
                        <label class="mdl-textfield__label" for="articleTitle">Titlu (romana)</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:97%">
                        <input class="mdl-textfield__input" type="text" name="articleTitleEN" id="articleTitleEN">
                        <label class="mdl-textfield__label" for="articleTitle">Title (english)</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:97%">
                        <input type="file" name="userfile" size="20" accept="image/x-png,image/jpeg">
                    </div>
                    <span>Continut in romana</span>
                    <textarea name="articolRO"></textarea><br>
                    <span>English content</span>
                    <textarea name="articolEN"></textarea>
                    <script>
                      CKEDITOR.replace( 'articolRO' );
                        CKEDITOR.replace( 'articolEN' );
                    </script>
            </div>
            <div class="mdl-card__actions mdl-card--border">
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

    <script>
    $('#haiAzi').on('submit', function(e) {
        e.preventDefault();       
        var card = $('#codCard').val();
        var data = {
            'codCard' : card,   
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        };
        $.ajax({
            type: "POST",
            url: "<?php echo base_url()?>Medic/searchUser/",
            dataType: "json",
            data: data,                  
            success: function(data){
                if(data.valid){
                    $("#amZis").html("");
                    $("#amZis").append("<center>" + data.name + "<br>" + data.where + "<br>" + data.byear + "<br><br><a href='<?php echo base_url("Pacient/") ?>" + card + "' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect'>Vezi dosar medical</a><br><br><a href='<?php echo base_url("Insert/"); ?>" + card + "' class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect'>Insereaza informatii in dosarul medical</a></center><br><br>");
                }else{
                    $("#amZis").html("");
                    $("#amZis").append("<center>Codul de card inserat nu exista in baza de date.</center><br>");
                }
            }
        });
    });
    </script>
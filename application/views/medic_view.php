
    <script src="<?php echo base_url("assets/plugins/ckeditor/ckeditor.js"); ?>"></script>
    <script src="<?= base_url("assets/plugins/ckeditor/adapters/jquery.js"); ?>"></script>
    <div class="mdl-grid f028HL">
        <h2 class="mdl-card__title-text" style="margin-left: auto;margin-right: auto;margin-top: 0.5%;">Dr. <?= session("loggedInfo", "Name"); ?> @ Medic Pan<?= translate("ou", "el"); ?></h2>
        <hr style="width:100%">
        <div class="demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;">
            <div class="mdl-card__title mdl-card--expand" style="background:#62BA66">
                <h2 class="mdl-card__title-text"><?php echo translate("Caută pacient", "Search patient"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">search</i></h2>
            </div>
            <div class="mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/SearchCard/"); ?>
                <div class="center mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                    <label class="mdl-textfield__label">Card Code</label>
                    <input type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="codCard" class="mdl-textfield__input">
                    <span class="mdl-textfield__error">You have to insert a Card Code.</span>
                </div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <button onclick="return confirm('Esti sigur?')" type="submit" class="center mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" data-upgraded=",MaterialButton,MaterialRipple">
                    <?php echo translate("CAUTA", "SEARCH"); ?>
                    <span class="mdl-button__ripple-container">
                        <span class="mdl-ripple"></span>
                    </span>
                </button>
            </div>
            <?php echo form_close(); ?>
        </div>
        <div class="demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;margin-top: 40px; ">
            <div class="mdl-card__title mdl-card--expand" style="background:#6A9CF3">
                <h2 class="mdl-card__title-text"><?php echo translate("Observații medicale", "Medical notes"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">event_note</i></h2>
            </div>
            <div class="mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/InsertNote/"); ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:97%">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="cardCodePatient" id="cardCodePatient">
                        <label class="mdl-textfield__label" for="cardCodePatient">Codul de card al pacientului</label>
                        <span class="mdl-textfield__error"><?= translate("Codul de card trebuie sa fie numeric", "Card Code needs to be numeric"); ?></span>
                    </div>
                    <textarea name="ckeditor"></textarea>
                    <script>
                      CKEDITOR.replace( 'ckeditor' );
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
        
        
        <div class="demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;margin-top:40px;">
            <div class="mdl-card__title mdl-card--expand" style="background:#F3645A">
                <h2 class="mdl-card__title-text"><?php echo translate("Medicații", "Medications"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">colorize</i></h2>
            </div>
            <div class="mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/InsertMedication/"); ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:97%">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="cardCodePatient" id="cardCodePatient">
                        <label class="mdl-textfield__label" for="cardCodePatient">Codul de card al pacientului</label>
                        <span class="mdl-textfield__error"><?= translate("Codul de card trebuie sa fie numeric", "Card Code needs to be numeric"); ?></span>
                    </div>
                    <textarea name="medicatii"></textarea>
                    <script>
                      CKEDITOR.replace( 'medicatii' );
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
        
        
        <div class="demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;margin-top:40px;">
            <div class="mdl-card__title mdl-card--expand" style="background:#FF9800">
                <h2 class="mdl-card__title-text"><?php echo translate("Recomandări", "Recomandations"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">thumb_up</i></h2>
            </div>
            <div class="mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/InsertRecomandation/"); ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:97%">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="cardCodePatient" id="cardCodePatient">
                        <label class="mdl-textfield__label" for="cardCodePatient">Codul de card al pacientului</label>
                        <span class="mdl-textfield__error"><?= translate("Codul de card trebuie sa fie numeric", "Card Code needs to be numeric"); ?></span>
                    </div>
                    <textarea name="recomandari"></textarea>
                    <script>
                      CKEDITOR.replace( 'recomandari' );
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
        
        <div class="demo-card-square mdl-card mdl-shadow--2dp center" style="width: 65%;margin-top:40px;">
            <div class="mdl-card__title mdl-card--expand" style="background:#009688">
                <h2 class="mdl-card__title-text"><?php echo translate("Diagnostice recente", "Recent diagnostics"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">access_time</i></h2>
            </div>
            <div class="mdl-card__supporting-text" style="width:97%">
                <?php echo form_open("Medic/InsertDiagnosis/"); ?>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:97%">
                        <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="cardCodePatient" id="cardCodePatient">
                        <label class="mdl-textfield__label" for="cardCodePatient">Codul de card al pacientului</label>
                        <span class="mdl-textfield__error"><?= translate("Codul de card trebuie sa fie numeric", "Card Code needs to be numeric"); ?></span>
                    </div>
                    <textarea name="diagnosis"></textarea>
                    <script>
                      CKEDITOR.replace( 'diagnosis' );
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


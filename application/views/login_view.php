<?php if($this->session->userdata('loggedInfo')["ID"]) { redirect(base_url()); } ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dialog-polyfill/0.4.7/dialog-polyfill.min.js"></script>

    <?php if(!in_array($this->uri->segment(2), array(null, "2"))) redirect(base_url()); ?>
    <?php if($this->uri->segment(2) === null && $this->session->userdata('loginSession')["step"] == null) { ?>
    <div class="mdl-grid f028HL">
        <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell--8-col mdl-grid-8">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">
                    <?php echo translate("Accesează-ți contul", "Sign in to your account"); ?>
                </h2>
            </div>
            <?php echo form_open('Login', 'id="stepCodeko"'); ?>
            <div class="center mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="stepCode">Your Card Code</label>
                <input type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="stepCode" class="mdl-textfield__input" id="stepCode">
                <span class="mdl-textfield__error">You have to insert a Card Code.</span>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <button type="submit" class="center mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    <?php echo translate("Urmatorul pas", "Next step"); ?>
                </button>
            </div>
            <?php echo form_close(); ?>
            <div class="mdl-card__menu">
                <button id="loginHelp" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                    <i class="material-icons">help</i>
                </button>
            </div>
        </div>
        
    </div>
    <dialog id="dielog" class="mdl-dialog mdl-grid-8">
        <h4 class="mdl-dialog__title"><?php echo translate("Despre accesarea contului", "About accesing your account"); ?></h4>
        <div class="mdl-dialog__content">
            <p>
                <?php echo translate("Pentru a-ți accesa contul, trebuie să ai un cont activ pe acest site. Introdu emailul, apoi parola pentru a-ți verifica identitatea.", "To access your account you need an active account on this site. Type your email, then yours password to verify your identity."); ?>
                <br><br>
                <?php echo translate("HealthLog este o platformă de interacțiune între doctor și pacient, totodată stocând și actualizând dosarul medical al pacientului.", "HealthLog is an interaction platform between doctors and patients, storing and updating patient's medical files."); ?>
            </p>
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close">
                OK
            </button>
        </div>
    </dialog>
    <script defer>
        var dialog = document.querySelector('#dielog');
        var showDialogButton = document.querySelector('#loginHelp');
        if (! dialog.showModal) {
          dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function() {
          dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function() {
          dialog.close();
        });
        
        $(document).ready(function(){
            $('#stepCodeko').on('submit', function(e) {
                e.preventDefault();       
                var code = $('#stepCode').val();
                var data = {
                    'code' : code,   
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>Login/stepCode/",
                    dataType: "json",
                    data: data,                  
                    success: function(data){
                        if(data.valid){
                            window.location = "<?php echo base_url("login/2"); ?>";
                        }else{
                            $(".mdl-textfield__error").css("visibility", "visible");
                            $(".mdl-textfield__error").html(data.errorMessage);
                        }
                    }
                });
            });
        });
    </script>
    <?php } ?>
    <?php if(!strcmp($this->uri->segment(2), "2") && $this->session->userdata('loginSession')["step"] == "2") { ?>
    <div class="mdl-grid f028HL">
        <div class="demo-card-wide mdl-card mdl-shadow--2dp mdl-cell--8-col mdl-grid-8">
            <div class="mdl-card__title">
                <h2 class="mdl-card__title-text">
                    <?php echo translate("Accesează-ți contul", "Sign in to your account"); ?>
                </h2>
            </div>
            <?php echo form_open('Login', 'id="stepCodevo"'); ?>
            <div class="center mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <label class="mdl-textfield__label" for="stepCode">Your password</label>
                <input type="password" name="stepPassword" class="mdl-textfield__input" id="stepPassword">
                <span class="mdl-textfield__error"></span>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <button type="submit" class="center mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    <?php echo translate("Urmatorul pas", "Next step"); ?>
                </button>
            </div>
            <?php echo form_close(); ?>
            <div class="mdl-card__menu">
                <button id="loginHelp" class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                    <i class="material-icons">help</i>
                </button>
            </div>
        </div>
    </div>
    <dialog id="dielog" class="mdl-dialog mdl-grid-8">
        <h4 class="mdl-dialog__title"><?php echo translate("Despre accesarea contului", "About accesing your account"); ?></h4>
        <div class="mdl-dialog__content">
            <p>
                <?php echo translate("Pentru a-ți accesa contul, trebuie să ai un cont activ pe acest site. Introdu emailul, apoi parola pentru a-ți verifica identitatea.", "To access your account you need an active account on this site. Type your email, then yours password to verify your identity."); ?>
                <br><br>
                <?php echo translate("HealthLog este o platformă de interacțiune între doctor și pacient, totodată stocând și actualizând dosarul medical al pacientului.", "HealthLog is an interaction platform between doctors and patients, storing and updating patient's medical files."); ?>
            </p>
        </div>
        <div class="mdl-dialog__actions">
            <button type="button" class="mdl-button close">
                OK
            </button>
        </div>
    </dialog>
    <script defer>
        var dialog = document.querySelector('#dielog');
        var showDialogButton = document.querySelector('#loginHelp');
        if (! dialog.showModal) {
          dialogPolyfill.registerDialog(dialog);
        }
        showDialogButton.addEventListener('click', function() {
          dialog.showModal();
        });
        dialog.querySelector('.close').addEventListener('click', function() {
          dialog.close();
        });
        
        $(document).ready(function(){
            $('#stepCodevo').on('submit', function(e) {
                e.preventDefault();       
                var password = $('#stepPassword').val();
                var data = {
                    'passwordeanu' : password,   
                    '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                };
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url()?>Login/stepPassword/",
                    dataType: "json",
                    data: data,                  
                    success: function(data){
                        if(data.valid){
                            window.location = "<?php echo base_url(); ?>";
                        }else{
                            $(".mdl-textfield__error").css("visibility", "visible");
                            $(".mdl-textfield__error").html(data.errorMessage);
                        }
                    }
                });
            });
        });
    </script>
    <?php } ?>
</main>
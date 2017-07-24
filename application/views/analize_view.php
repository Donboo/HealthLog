<?php
$patient = $this->uri->segment(2);
if(!strcmp($patient, "") || !is_numeric($patient) || !getUserData($patient)) {
    $this->session->set_flashdata('error', 'Cod de card inexistent');
    redirect(base_url());
}

if((session('loggedInfo', 'CardCode') != $patient) && session('loggedInfo', 'AccountType') != 1) {
    $this->session->set_flashdata('error', 'Nu ai permisiunea de a vedea informatiile altor pacienti.');
    redirect(base_url());
}

?>
    <div class="mdl-grid f028HL">
        
        <?php
            if($this->analize_model->selectorWhereActive($patient, "Date")): ?>
        <div class="mdl-components__warning" style="margin-top: 2%;background-color:#E45D5D;">
                <?php echo translate("Ai o programare activa pe data de " . $this->analize_model->selectorWhereActive($patient, "Date"), "You have an active schedule for " . $this->analize_model->selectorWhereActive($patient, "Date")); ?>     
        </div>
        <?php endif; ?>
        <div class="demo-card-square mdl-card mdl-shadow--2dp mdl-cell--8-col mdl-grid-8">
            <div class="mdl-card__title mdl-card--expand" style="background:#F36A87;">
                <h2 class="mdl-card__title-text"><?php echo translate("Analize", "Analysis"); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">favorite</i></h2>
            </div>
            <div class="mdl-card__supporting-text">
                <div id='calendar'></div>
            </div>
            <div class="mdl-card__actions mdl-card--border">
                <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                    <?php echo translate("FĂ UN SET NOU DE ANALIZE", "CREATE A NEW ANALYSIS SET"); ?>
                </a>
            </div>

            
        </div>
    </div>
    <script defer>

	$(document).ready(function() {        
		$('#calendar').fullCalendar({
            events: [
            <?php
                $query = $this->db->query("SELECT Date FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.analyzes") . " WHERE `ReservedBy` = ?", array($patient));
                if($query->num_rows()) {
                    foreach($query->result() as $row) {
                        ?>
                        {
                            title: 'Analize',
                            start: '<?= $row->Date ?>'
                        },
                <?php 
                    }
                } 
            ?>
            ],
            dayClick: function(date, jsEvent, view) {
                if (confirm('Esti sigur ca te programezi pe ' + date.format() + '?')) {
                    var data = {
                        'date' : date.format(),   
                        '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
                    };
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url()?>Analize/setAnalize/",
                        dataType: "json",
                        data: data,                  
                        success: function(data){
                            if(data.valid){
                                if(data.valid != 2)
                                    window.location = "<?php echo base_url(); ?>/analize/<?php echo $patient; ?>";
                                else alert("Programare invalida. Te rugam sa faci programarea pe o data ce va urma.");
                            }else{
                                alert("Ai deja o programare activa.");
                            }
                        }
                    });
                }
            },
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay'
			},
			defaultDate: $('#calendar').fullCalendar('today'),
			navLinks: true,
			editable: true,
			eventLimit: true, 
		});
		
	});

</script>


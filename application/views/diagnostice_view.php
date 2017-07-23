<?php
$patient = $this->uri->segment(2);
if(!strcmp($patient, "") || !is_numeric($patient) || !is_numeric(getUserData($patient, "ID"))) {
    $this->session->set_flashdata('error', 'Cod de card inexistent');
    redirect(base_url());
}

if((session('loggedInfo', 'CardCode') != $patient) && session('loggedInfo', 'AccountType') != 1) {
    $this->session->set_flashdata('error', 'Nu ai permisiunea de a vedea informatiile altor pacienti.');
    redirect(base_url());
}
?>
    <div class="mdl-grid f028HL">
        <div class="demo-card-square mdl-card mdl-shadow--2dp mdl-cell--8-col mdl-grid-8">
            <div class="mdl-card__title mdl-card--expand" style="background:#009688">
                <h2 class="mdl-card__title-text"><?php echo translate("Diagnostice recente - " . getUserData($patient), "Recent diagnosis - " . getUserData($patient)); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">access_time</i></h2>
            </div>
            <div style="width: 96%;margin: auto;" class="mdl-card__supporting-text ">
                <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp" style="width:100%">
                  <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric">Medic</th>
                        <th class="mdl-data-table__cell--non-numeric"><?= translate("Spital", "Hospital"); ?></th>
                        <th class="mdl-data-table__cell--non-numeric"><?= translate("Diagnostic", "Note"); ?></th>
                        <th class="mdl-data-table__cell--non-numeric">Dat<?= translate("a", "e"); ?></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query = $this->db->query("SELECT `DoctorCode`, `Diagnostic`, `Hospital`, `Date` FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.diagnostics") . " WHERE `CardCode` = ?", array($patient));
                      
                        if(!$query->num_rows()) echo "<td class='mdl-data-table__cell--non-numeric' colspan=3>Diagnostice inexistente.</td>";
                      
                        foreach($query->result() as $row)
                        { ?>
                         <tr>
                             <td class="mdl-data-table__cell--non-numeric"><?= get_info("Name", $this->config->item("web_table_prefix") . $this->config->item("web_table.users"), "CardCode", $row->DoctorCode); ?></td>
                             <td class="mdl-data-table__cell--non-numeric"><?= getHospitalByCounty($row->Hospital); ?></td>
                             <td class="mdl-data-table__cell--non-numeric"><?= $row->Diagnostic; ?></td>
                             <td class="mdl-data-table__cell--non-numeric"><?= convertTimestampToDate($row->Date); ?></td>
                         </tr>   
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>


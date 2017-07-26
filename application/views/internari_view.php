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
        <div class="demo-card-square mdl-card mdl-shadow--2dp mdl-cell--8-col mdl-grid-8">
            <div class="mdl-card__title mdl-card--expand" style="background:#4CAF50;">
                <h2 class="mdl-card__title-text"><?php echo translate("Istoric internări - " . getUserData($patient), "Hospitalizations historic- " . getUserData($patient)); ?><i class="material-icons" style="opacity: 0.3;font-size: 380%;position: absolute;top: -6px;right: 0;">local_hospital</i></h2>
            </div>
            <div style="width: 96%;margin: auto;" class="mdl-card__supporting-text ">
                <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp" style="width:100%">
                  <thead>
                    <tr>
                      <th class="mdl-data-table__cell--non-numeric">Spital</th>
                      <th class="mdl-data-table__cell--non-numeric">Doctor</th>   
                      <th class="mdl-data-table__cell--non-numeric">Perioada</th>
                      <th class="mdl-data-table__cell--non-numeric">Cauza</th>
                      <th class="mdl-data-table__cell--non-numeric">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $query = $this->db->query("SELECT `ID`, `Hospital`, `DoctorCode`, `StartDate`, `StopDate`, `Reason` FROM " . $this->config->item("web_table_prefix") . "" . $this->config->item("web_table.hospitalizations") . " WHERE `CardCode` = ?", array($patient));
                      
                        if(!$query->num_rows()) echo "<td class='mdl-data-table__cell--non-numeric' colspan=3>Internari inexistente.</td>";
                      
                        foreach($query->result() as $row)
                        { ?>
                         <tr>
                             <td class="mdl-data-table__cell--non-numeric"><?= getHospitalByCounty($row->Hospital); ?></td>
                             <td class="mdl-data-table__cell--non-numeric"><?= get_info("Name", $this->config->item("web_table_prefix") . $this->config->item("web_table.users"), "CardCode", $row->DoctorCode); ?></td>
                             <td class="mdl-data-table__cell--non-numeric"><?= convertTimestampToDate($row->StartDate); ?> - <?= convertTimestampToDate($row->StartDate); ?></td>
                             <td class="mdl-data-table__cell--non-numeric"><?= $row->Reason; ?></td>
                             <?php if($row->StartDate == $row->StopDate) { ?>
                             <td class="mdl-data-table__cell--non-numeric">
                                <?php echo translate("INTERNAT", "ACTIVE"); ?>
                             </td>
                             <?php } else echo '<td class="mdl-data-table__cell--non-numeric">' . translate("EXTERNAT", "RELEASED") . '</td>'; ?>
                         </tr>   
                    <?php
                        }
                    ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
if(isset($_POST['searchname']) && !empty($_POST["searchname"])) { ?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
 <div id="content">
    <div id="contentWrap">
        <div id="contentBox">
            <div class="pageTitle">
                Search
            </div>
            <div id="contentMain">
                <div id="contentPage">
                    <div class="col-md-12 col-lg-12">
                        <div class="widget-bg-color-icon card-box fadeInDown animated">
                            <h3><i class = 'fa fa-search'></i> Search results for "<?php echo htmlentities($_POST['searchname']); ?>"</h3>
                            <hr/>
                            <table style="width:100%;" border="0" cellspacing="0" cellpadding="0" class="vTable generalRightTable">
                                <tbody>
                                    <tr class="firstRow">
                                        <td class="headerTd">Name</td>
                                        <td class="headerTd">Faction</td>
                                        <td class="headerTd">Level</td>
                                    </tr>
                                    <?php
                                    $this -> db -> select("name, Member, Rank, Level, Skin");
                                    $this -> db -> like("name", $_POST['searchname']);
                                    $query = $this -> db -> get("accounts");
                                    foreach($query -> result() as $row) {
                                        echo "<tr>";
                                            echo "<td><a href = 'profile/".($row -> name)."'>";
                                            echo "<img src = '".($this -> config -> config['base_url'])."assets/images/Skin_small/".($row -> Skin).".png' style = 'width: 35px; border: 1px solid rgba(0, 0, 0, 0.2); margin-right: 5px;' class = 'img-circle'/> ";
                                            echo str_ireplace($_POST['searchname'], "<span class = 'text-danger'>".$_POST['searchname']."</span>", $row->name)."</a></td>";
                                            if($row -> Member) {
                                                $this -> db -> select("Name, Color");
                                                $query = $this -> db -> get_where("server_factions", array("ID" => ($row -> Member)));
                                                $res = $query -> result();
                                                echo "<td><span style = 'color: #".($res[0] -> Color).";'>".($res[0] -> Name)."</span></td>";
                                            } else echo "<td>Civillian</td>";
                                            echo "<td>".($row->Level)."</td>";
                                        echo "<tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                            Found <?php echo $query->num_rows(); ?> results for your search.
                        </div>
                    </div>
                <!-- end col -->



            </div>
            <!-- end row -->


        </div> <!-- container -->

<?php
} else redirect($this->config->config['base_url'], 'location');
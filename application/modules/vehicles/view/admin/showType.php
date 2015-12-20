<?php include ("layouts/aheader.php"); ?>
    <h2 id="witaj">Witaj w panelu administracyjnym</h2>
    <div id="admin_main_menu">
        <?php
        /**
         * @var $this BasicView
         * @var $vehicle_type DBResult
         */
        $component = $this->getComponent("admin_menu");
        $component->show();
        $vehicle_type = $this->_vehicle_types;
        ?>
    </div>

    <div id="admin_category">
        <a href="/admin/vehicles/addType" id="add_button">
            <img title="Dodaj typ pojazdu" alt="Dodaj typ pojazdu" src="/public/images/add.png" class="icon"> Dodaj typ pojazdu
        </a>
        <table cellspacing="0" id="tab_list">
            <tbody><tr>
                <th width="30px">Lp.</th><th width="200px">Typ pojazdu</th><th width="200px">Akcje</th>
            </tr>
            <?php
            $i = 1;
            while($vehicle_type->next()) {
                $row = $vehicle_type->current();
                ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><h3><?php echo $row["type_name"]; ?></h3></td>
                    <td>
                        <a href="/admin/vehicles/editType/id/<?php echo $row["id"]; ?>">
                            <img title="edytuj" alt="edytuj" src="/public/images/modify_m.png" class="icon"> edytuj
                        </a>
                        <a id="remove" name="potwierdz" href="/admin/vehicles/removeType/id/<?php echo $row["id"]; ?>">
                            <img title="usuń" alt="usuń" src="/public/images/delete_m.png" class="icon"> usuń
                        </a>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
<?php include ("layouts/afooter.php"); ?>
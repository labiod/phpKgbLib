<?php include ("layouts/aheader.php"); ?>
<h2 id="witaj">Witaj w panelu administracyjnym</h2>
<div id="admin_main_menu">
    <?php
    /**
     * @var $this BasicView
     * @var $region DBResult
     */
    $component = $this->getComponent("admin_menu");
    $component->show();
    $component = $this->getComponent("users");
    $component->show();
    $region = $this->_region;
    ?>
</div>

<div id="admin_category">
    <a href="/admin/settings/addRegion" id="add_button">
        <img title="Dodaj województwo" alt="Dodaj województwo" src="/public/images/add.png" class="icon"> Dodaj województwo
    </a>
    <table cellspacing="0" id="tab_list">
        <tbody><tr>
            <th width="30px">Lp.</th><th width="200px">Nazwa województwa</th><th width="200px">Akcje</th>
        </tr>
        <?php
        $i = 1;
        while($region->next()) {
            $row = $region->current();
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><h3><?php echo $row["nazwa"]; ?></h3></td>
                <td>
                    <a id="remove" name="potwierdz" href="/admin/settings/removeRegion/id/<?php echo $row["id_wojewodztwo"]; ?>">
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
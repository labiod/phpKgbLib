<?php include ("layouts/aheader.php");
?>
    <h2 id="witaj">Witaj w panelu administracyjnym</h2>
    <div id="admin_main_menu">
        <?php
        /**
         * @var $this BasicView
         * @var $vehicleType VehicleType
         */
        $component = $this->getComponent("admin_menu");
        $component->show();
        $vehicleType = $this->_vehicleType;
        ?>
    </div>

    <div id="admin_category">
        <form enctype="application/x-www-form-urlencoded" method="post" action="/admin/vehicles/editType" name="skladniki">
            <table cellspacing="0" id="tab_edit">
                <tbody>
                <tr>
                    <th colspan="2">Edytuj typ pojazdu</th>
                </tr>
                <tr>
                    <td class="left">Nazwa:</td><td class="right"><input type="text" value="<?php echo $vehicleType->getTypeName(); ?>" name="name" id="name" class="itext"></td>
                </tr>
                <tr>
                    <td class="cntr" colspan="2">
                        <input type="hidden" name="id" value="<?php echo $vehicleType->getId(); ?>" />
                        <a href="/admin/category/show"><input type="button" value="Wróć" class="button" name="redirect" id="redirect"></a>
                        <input type="submit" value="Edytuj" class="button" name="submit" id="submit">
                    </td></tr>
                </tbody></table>

        </form>
    </div>
<?php include ("layouts/afooter.php"); ?>
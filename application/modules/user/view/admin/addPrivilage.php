<?php include ("layouts/aheader.php");
?>
    <h2 id="witaj">Witaj w panelu administracyjnym</h2>
    <div id="admin_main_menu">
        <?php
        /**
         * @var $this BasicView
         * @var $select SimpleSelect
         * @var $role_priv DBResult
         */
        $component = $this->getComponent("admin_menu");
        $component->show();
        $component = $this->getComponent("users");
        $component->show();
        $select = $this->_select;
        ?>
    </div>

    <div id="admin_category">
        <form enctype="application/x-www-form-urlencoded" method="post" action="/admin/user/addPrivilage" name="privilage">
            <table cellspacing="0" id="tab_edit">
                <tbody>
                <tr>
                    <th colspan="2">Edytuj dostęp</th>
                </tr>
                <tr>
                    <td class="left">Typ użytkownika:</td><td class="right"><?php $select->show(); ?></td>
                </tr>
                <tr>
                    <td class="left">Moduł:</td>
                    <td class="right"><input type="text" value="" name="module" id="name" class="itext"></td>
                </tr>
                <tr>
                    <td class="left">Akcja:</td>
                    <td class="right"><input type="text" value="" name="action_name" id="name" class="itext"></td>
                </tr>
                <tr>
                    <td class="cntr" colspan="2">
                        <a href="/admin/user/userPrivilages"><input type="button" value="Wróć" class="button" name="redirect" id="redirect"></a>
                        <input type="submit" value="Edytuj" class="button" name="submit" id="submit">
                    </td></tr>
                </tbody></table>

        </form>
    </div>
<?php include ("layouts/afooter.php"); ?>
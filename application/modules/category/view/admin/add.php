<?php include ("layouts/aheader.php"); ?>
    <h2 id="witaj">Witaj w panelu administracyjnym</h2>
    <div id="admin_main_menu">
        <?php
        /**
         * @var $this BasicView
         * @var $categories DBResult
         * @var $select SimpleSelect
         */
        $component = $this->getComponent("admin_menu");
        $component->show();
        $categories = $this->_categories;
        $select = $this->_select;
        ?>
    </div>

    <div id="admin_category">
        <form enctype="application/x-www-form-urlencoded" method="post" action="/admin/category/add" name="skladniki">
            <table cellspacing="0" id="tab_edit">
                <tbody>
                <tr>
                    <th colspan="2">Dodaj kategorię</th>
                </tr>
                <tr>
                    <td class="left">Nazwa kategorii:</td><td class="right"><input type="text" value="" name="name" id="name" class="itext"></td>
                </tr>
                <tr>
                    <td class="left">Typ pojazdu:</td><td class="right"><?php $select->show(); ?></td>
                </tr>
                <tr>
                    <td class="cntr" colspan="2">
                        <a href="/admin/category/show"><input type="button" value="Wróć" class="button" name="redirect" id="redirect"></a>
                        <input type="submit" value="Dodaj" class="button" name="submit" id="submit">
                    </td></tr>
                </tbody></table>

        </form>
    </div>
<?php include ("layouts/afooter.php"); ?>
<?php include ("layouts/aheader.php"); ?>
    <h2 id="witaj">Witaj w panelu administracyjnym</h2>
    <div id="admin_main_menu">
        <?php
        /**
         * @var $this BasicView
         * @var $categories DBResult
         */
        $component = $this->getComponent("admin_menu");
        $component->show();
        $component = $this->getComponent("users");
        $component->show();
        $categories = $this->_categories;
        ?>
    </div>

    <div id="admin_category">
        <a href="/admin/category/add" id="add_button">
            <img title="Dodaj grupę cenową" alt="Dodaj grupę cenową" src="/public/images/add.png" class="icon"> Dodaj nową ketegorie
        </a>
        <table cellspacing="0" id="tab_list">
            <tbody><tr>
                <th width="30px">Lp.</th><th width="200px">Nazwa ketegorii</th><th width="130px">Typ pojazdu</th><th width="200px">Akcje</th>
            </tr>
            <?php
            $i = 1;
            while($categories->next()) {
                $row = $categories->current();
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><h3><?php echo $row["name"]; ?></h3></td>
                <td><h3><?php echo $row["type_name"]; ?></h3></td>
                <td>
                    <a href="/admin/category/edit/id/<?php echo $row["id"]; ?>">
                        <img title="edytuj" alt="edytuj" src="/public/images/modify_m.png" class="icon"> edytuj
                    </a>
                    <a id="remove" name="potwierdz" href="/admin/category/remove/id/<?php echo $row["id"]; ?>">
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
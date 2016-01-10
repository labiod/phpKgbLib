<?php include("layouts/aheader.php"); ?>
    <h2 id="witaj">Witaj w panelu administracyjnym</h2>
    <div id="admin_main_menu">
        <?php
        /**
         * @var $this BasicView
         * @var $role_priv DBResult
         */
        $component = $this->getComponent("admin_menu");
        $component->show();
        $component = $this->getComponent("users");
        $component->show();
        ?>
    </div>
<?php AlertMessage::showMessage($this->msg); ?>
    <div id="admin_category">
        <a href="/admin/user/addPrivilage" id="add_button">
            <img title="Nadaj uprawnienie" alt="Nadaj uprawnienie" src="/public/images/add.png" class="icon"> Nadaj uprawnienia
        </a>
        <table cellspacing="0" id="tab_list">
            <tr>
                <th>Lp.</th>
                <th>Typ użytkownika</th>
                <th>Dostęp</th>
                <th>Akcje</th>
            </tr>
            <?php if ($this->privilages != null) {
                $i = 0;
                foreach ($this->privilages as $privilage) {
                    ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $privilage["role_name"]; ?></td>
                        <td><?php echo $privilage["module"]."/".$privilage["action_name"]; ?></td>
                        <td>
                            <a href="/admin/user/editPrivilage/id/<?php echo $privilage["id_privilage"]; ?>">
                                <img title="edytuj" alt="edytuj" src="/public/images/modify_m.png" class="icon"> edytuj</a>
                            <a href="/admin/user/deletePrivilage/id/<?php echo $privilage["id_privilage"]; ?>" class="potwierdz">
                                <img title="usuń" alt="usuń" src="/public/images/delete_m.png" class="icon"> usuń</a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="5">Brak przynanych dostępów.</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
<?php include("layouts/footer.php"); ?>
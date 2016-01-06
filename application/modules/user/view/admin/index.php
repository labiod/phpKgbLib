<?php include("layouts/aheader.php"); ?>
    <h2 id="witaj">Witaj w panelu administracyjnym</h2>
    <div id="admin_main_menu">
        <?php
        /**
         * @var $this BasicView
         * @var $vehicle_type DBResult
         */
        $component = $this->getComponent("admin_menu");
        $component->show();
        $component = $this->getComponent("users");
        $component->show();
        ?>
    </div>
<?php AlertMessage::showMessage($this->msg); ?>
    <div id="admin_category">
        <table cellspacing="0" id="tab_list">
            <tr>
                <th>Lp.</th>
                <th>Nazwisko</th>
                <th>Imie</th>
                <th>E-mail</th>
                <th>Miasto</th>
                <th>Aktywny</th>
                <th>Akcje</th>
            </tr>
            <?php if ($this->users != "") {
                $i = 0;
                foreach ($this->users as $users) {
                    ?>
                    <tr>
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $users["last_name"]; ?></td>
                        <td><?php echo $users["first_name"]; ?></td>
                        <td><?php echo $users["email"]; ?></td>
                        <td><?php echo $users["city"]; ?></td>
                        <td><?php if ($users["active"] == 'Y') { ?>
                                tak
                            <?php } else { ?>
                                nie <a href="/admin/user/confirmUser/id/<?php echo $users["id_user"]; ?>">uaktywnij</a>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="/admin/user/details/id/<?php echo $users["id_user"]; ?>">podgląd</a>
                            <a href="/admin/user/edit/id/<?php echo $users["id_user"]; ?>">
                                <img title="edytuj" alt="edytuj" src="/public/images/modify_m.png" class="icon"> edytuj</a>
                            <a href="/admin/user/delete/id/<?php echo $users["id_user"]; ?>" class="potwierdz">
                                <img title="usuń" alt="usuń" src="/public/images/delete_m.png" class="icon"> usuń</a>
                        </td>
                    </tr>
                <?php }
            } else { ?>
                <tr>
                    <td colspan="5">Brak zarejestrowanych użytkowników.</td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
<?php include("layouts/footer.php"); ?>
<?php include("layouts/aheader.php");
?>
    <h2 id="witaj">Witaj w panelu administracyjnym</h2>
    <div id="admin_main_menu">
        <?php
        /**
         * @var $this BasicView
         * @var $select SimpleSelect
         * @var $user UserTable
         */
        $component = $this->getComponent("admin_menu");
        $component->show();
        $component = $this->getComponent("users");
        $component->show();
        $user = $this->_user;
        $select = $this->_select;
        ?>
    </div>

    <div id="admin_category">
        <form enctype="application/x-www-form-urlencoded" method="post" action="/admin/user/editPrivilage"
              name="privilage">
            <table cellspacing="0" id="tab_edit">
                <tbody>
                <tr>
                    <th colspan="2"><?php echo "Edytuj " . $user->getRole()->getRoleName(); ?></th>
                </tr>

                <?php
                    switch($user->getRoleId()) {
                        case 1:
                            include "student_section.php";
                            break;
                        case 2:
                            include "osk_section.php";
                            break;
                        case 3:
                            include "teacher_section.php";
                            break;
                        case 4:
                            include "admin_section.php";
                            break;
                    }
                ?>
                <?php include "address_section.php"; ?>
                <tr>
                    <td class="left">Akcja:</td>
                    <td class="right"><input type="text" value="" name="action_name" id="name" class="itext"></td>
                </tr>
                <tr>
                    <td class="cntr" colspan="2">
                        <input type="hidden" name="id" value=""/>
                        <a href="/admin/user/userPrivilages"><input type="button" value="Wróć" class="button"
                                                                    name="redirect" id="redirect"></a>
                        <input type="submit" value="Edytuj" class="button" name="submit" id="submit">
                    </td>
                </tr>
                </tbody>
            </table>

        </form>
    </div>
<?php include("layouts/afooter.php"); ?>
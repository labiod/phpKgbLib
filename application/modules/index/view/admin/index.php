<?php include ("layouts/aheader.php"); ?>
<h2 id="witaj">Witaj w panelu administracyjnym</h2>
<?php
    /**
     * @var $this BasicView
     */
    $component = $this->getComponent("admin_menu");
    $component->show();
    $component = $this->getComponent("users");
    $component->show();
?>
<?php include ("layouts/afooter.php"); ?>
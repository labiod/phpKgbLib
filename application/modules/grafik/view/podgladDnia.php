<?php
$tableHeader = <<<EOD
<table>
   <caption>{$this->tab['d']}-{$this->tab['m']}-{$this->tab['y']}</caption>
<tr><th>Godzina</th>
EOD;

if ($this->isAjax) {
    echo $tableHeader;
} else {
	include ("layouts/uheader.php");
    echo $tableHeader;
	include ("layouts/footer.php");
}
?>
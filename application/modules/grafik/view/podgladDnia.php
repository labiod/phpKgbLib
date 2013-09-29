<?php  
$tableHeader =<<<EOD
<table>
   <caption>{$tab[d]}-{$tab[m]}-{$tab[y]}</caption>
<tr><th>Godzina</th>
EOD;
?>








<?php 
if($this->isAjax){
echo $tableHeader;

}else{
include ("layouts/uheader.php"); 	?>


<?php include ("layouts/footer.php");
} ?>
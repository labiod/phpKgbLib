<?php //print_r($this->dateLinks); die();?>
<?php include ("layouts/uheader.php"); 	?>
<h2 id="title">Grafik jazd</h2>  <div class="clear"></div> 
<?php $ldni = $this->dateInfo["ldni"]; $start = $this->dateInfo["mcstart"]; $max = $start + $ldni; $j=0; $i = 0; ?>
<table id="monthViewTable">
    <caption>
        <a href="<?php echo $this->dateLinks['prevLink']; ?>">&lt;&lt;</a> 
            <?php echo $this->dateInfo["mc"] . " " . $this->dateInfo["rok"]; ?>
        <a href="<?php echo $this->dateLinks['nextLink']; ?>">&gt;&gt;</a>
    </caption>
    <?php $started = false;
    while($i < $ldni){
        echo '<tr>';
        for($j = 1; $j < 8; $j++){
            echo "<td>"; 
            if(!$started){
                if($j == $start){
                    echo "<a href='" . $this->dateLinks['dayLink'] . "'" . ++$i . ">" . $i . "</a>";
                    $started = true;
                }
            }else{
                if($i < $ldni){
                    echo "<a href='" . $this->dateLinks['dayLink'] . "'" . ++$i . ">" . $i . "</a>";
                }
            }
            echo "</td>";
        }
        echo '</tr>';
    }
?>
</table>
<?php include ("layouts/footer.php"); ?>
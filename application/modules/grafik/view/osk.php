<?php include("layouts/uheader.php");
    $component = $this->getComponent("strefa");
    if($component != null) {
    ?><div class="strefa_left_menu">
<?php $component->show(); ?>
    </div><?php
} ?>
<div id="grafik_full">
    <div id="grafik_top">
        <div id="grafik_title">Grafik jazd</div>
        <div>
            <a class="dni_grafik" href="grafik/osk/prev">&lt;&lt;</a>
            <div class="dni_grafik"><a>1</a></div>
            <div class="dni_grafik"><a>2</a></div>
            <div class="dni_grafik"><a>3</a></div>
            <div class="dni_grafik"><a>4</a></div>
            <div class="dni_grafik"><a>5</a></div>
            <div class="dni_grafik"><a>6</a></div>
            <div class="dni_grafik"><a>7</a></div>
            <a class="dni_grafik" href="grafik/osk/next">&gt;&gt;</a>
        </div>
    </div>
    <div id="grafik_content">
<!--        --><?php
//        $test = new Test();
//        $test->show();
//        ?>
        <table id="month_view_table" cellspacing="0">
            <caption>
                <a class="navLinks" href="<?php echo $this->dateLinks['prevMonth']; ?>">&lt;&lt; Poprzedni</a>
                <div id="pickMonth"><select><option>Wybierz miesiąc</option><option value="1">Styczeń</option></select></div>
                <?php echo $this->dateInfo["mc"] . " " . $this->dateInfo["year"]; ?>
                <div id="pickYear"><select><option>Wybierz rok</option><option value="2016">2016</option></select></div>
                <a class="navLinks" href="<?php echo $this->dateLinks['nextMonth']; ?>">Następny &gt;&gt;</a>
            </caption>
            <tr>
                <th>Poniedziałek</th>
                <th>Wtorek</th>
                <th>Środa</th>
                <th>Czwartek</th>
                <th>Piątek</th>
                <th>Sobota</th>
                <th>Niedziela</th>
            </tr>
            <?php
            $ldni = $this->dateInfo["ldni"];
            $start = $this->dateInfo["mcstart"];
            $max = $start + $ldni;
            $j = 0;
            $i = 1;
            $started = false;
            while ($i <= $ldni) {
                echo '<tr>';
                for ($j = 1; $j < 8; $j++) {
                    if($j == 7){
                        echo "<td class='sunday'>";
                    }else{
                        echo "<td>";
                    }
                    if (!$started && $j == $start) {
                            $started = true;
                    }
                    if ($started && $i <= $ldni) { ?>
                            <a href='<?php echo $this->dateLinks ['dayLink'] . $i;?>'>
                                <div><?php echo $i++; ?></div>
                                <div class="hoursCount">Wolne 4 h</div>
                                <!-- hoursCountNone -->
                            </a>

                    <?php }
                    echo "</td>";
                }
                echo '</tr>';
            }
            ?>
        </table>
        <div id="categories">
            <h4>Kategorie</h4>
            <div>A1</div>
            <div>A2</div>
            <div>A</div>
            <div class="selected_cat">B1</div>
            <div>B</div>
            <div>C</div>
            <div>D</div>
        </div>
    </div>
</div>
<?php include("layouts/footer.php"); ?>
<?php include("layouts/uheader.php"); ?>
<?php
/**
 * @var $this BasicView
 */
$component = $this->getComponent("strefa");
if($component != null) {
    ?><div class="strefa_left_menu">
    <?php $component->show(); ?>
    </div><?php
} ?>
    <div id="grafik_content">
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
            <div id="category">
                <div id="category_title">Kategoria</div>
                <div id="category_type">B</div>
            </div>
        </div>
        <div id="day_info">
            <div id="day_of_month">24</div>
            <div id="month_name">
                <a class="dni_grafik" href="grafik/osk/prevMonth">&lt;&lt;</a>
                <div class="grafik_div_floating_left">Październik</div>
                <a class="dni_grafik" href="grafik/osk/nextMonth">&gt;&gt;</a>
            </div>
            <div id="day_of_week">
                <a class="dni_grafik" href="grafik/osk/prevDay">&lt;&lt;</a>
                <div class="grafik_div_floating_left">Czwartek</div>
                <a class="dni_grafik" href="grafik/osk/nextDay">&gt;&gt;</a>
            </div>
        </div>
        <div id="dayPlan"></div>
        <?php $ldni = $this->dateInfo["ldni"];
        $start = $this->dateInfo["mcstart"];
        $max = $start + $ldni;
        $j = 0;
        $i = 1;
        $user = User::getLoggedUser();
        ?>
        <table id="monthViewTable">
            <caption>
                <?php echo $this->dateInfo["mc"] . " " . $this->dateInfo["rok"]; ?>
            </caption>
            <tr>
                <th>Pn</th>
                <th>Wt</th>
                <th>Śr</th>
                <th>Cz</th>
                <th>Pt</th>
                <th>Sb</th>
                <th>Nd</th>
            </tr>
            <?php

            $started = false;
            while ($i <= $ldni) {
                echo '<tr>';
                for ($j = 1; $j < 8; $j++) {
                    echo "<td>";
                    if (!$started) {
                        if ($j == $start) {
                            echo "<a class='dayLink' href='" . $this->dateLinks ['dayLink'] . $i . "'>" . $i . "</a>";
                            $started = true;
                            ++$i;
                        }
                    } else {
                        if ($i <= $ldni) {
                            echo "<a class='dayLink' href='" . $this->dateLinks ['dayLink'] . $i . "'>" . $i . "</a>";
                            ++$i;
                        }
                    }

                    echo "</td>";
                }
                echo '</tr>';
            }
            ?>
        </table>
    </div>
<?php include("layouts/footer.php"); ?>
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
        <h2 id="grafik_title">Grafik jazd</h2>

        <div class="clear"></div>
        <div id="dayPlan"></div>
        <?php $ldni = $this->dateInfo["ldni"];
        $start = $this->dateInfo["mcstart"];
        $max = $start + $ldni;
        $j = 0;
        $i = 1; ?>
        <span>Użytkownik: <?php
            $user = User::getLoggedUser();
            echo $user->getUserName(); ?></span>
        <a href="<?php echo $this->dateLinks['prevLink']; ?>">&lt;&lt; Poprzedni</a>
        <a href="<?php echo $this->dateLinks['nextLink']; ?>">Następny &gt;&gt;</a>
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
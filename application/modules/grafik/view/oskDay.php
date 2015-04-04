<?php include("layouts/uheader.php"); ?>
<?php
/**
 * @var $this BasicView
 */
$component = $this->getComponent("strefa");
if ($component != null) {
    ?>
    <div class="strefa_left_menu">
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
            <div id="day_of_month"
                 class="div_bordered grafik_div_floating_left"><?php echo $this->dateInfo["day"] ?></div>
            <div class="grafik_div_floating_left">
                <div id="month_name">
                    <a class="dni_grafik" href="<?php echo $this->dateLinks ['prevMonth']; ?>">&lt;&lt;</a>

                    <div class="div_bordered"><?php echo $this->dateInfo["mc"] ?></div>
                    <a class="dni_grafik" href="<?php echo $this->dateLinks ['nextMonth']; ?>">&gt;&gt;</a>
                </div>
                <div id="day_of_week">
                    <a class="dni_grafik" href="<?php echo $this->dateLinks ['prevDay']; ?>">&lt;&lt;</a>

                    <div class="div_bordered">Czwartek</div>
                    <a class="dni_grafik" href="<?php echo $this->dateLinks ['nextDay']; ?>">&gt;&gt;</a>
                </div>
            </div>
            <div id="grafik_addition_info"
                 class="div_bordered grafik_div_floating_right"><?php echo $this->dateInfo["year"]; ?></div>
        </div>
        <div id="dayPlan"></div>
        <?php
        $user = User::getLoggedUser();
        ?>
        <table id="day_view_table" cellspacing="0">
            <tr>
                <th><span>Godziny</span></th>
                <th><span>Imie i Nazwisko</span></th>
                <th><span>Miejsce jazd</span></th>
                <th><span>Rodzaj jazd</span></th>
                <th><span>Godzina kursu</span></th>
                <th><span>Telefon</span></th>
                <th><span>Opłata</span></th>
            </tr>
            <?php
            $i = 0;
            $started = false;
            $oskHoursCount = sizeof($this->oskHours);
            while ($i < $oskHoursCount) {
                /**
                 * @var $drive DriveBook
                 */
                $hour = $this->oskHours[$i];
                if (array_key_exists($hour, $this->oskMapHours)) {
                    $drive = $this->oskMapHours[$this->oskHours[$i]];
                } else {
                    $drive = DriveBook::emptyMock();
                }
                ?>
                <tr>
                    <td><?php echo $this->oskHours[$i++]; ?>:00</td>
                    <td><?php echo $drive->getStudentName(); ?></td>
                    <td><?php echo $drive->getDriveLocation(); ?></td>
                    <td><?php echo $drive->getDriveType(); ?></td>
                    <td><?php echo $drive->getDriveHour(); ?></td>
                    <td><?php echo $drive->getStudentPhone(); ?></td>
                    <td><?php echo $drive->getDrivePayment(); ?></td>
                </tr>
            <?php
            }
            ?>
        </table>
    </div>
<?php include("layouts/footer.php"); ?>
<?php
if (!defined('ABSPATH')) {
    die('Sorry, you are not allowed to access this page directly.');
}

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');
require_once ABSPATH . 'wp-admin/includes/file.php';
$letters = array(
    "#02" => "А",
    "#03" => "Б",
    "#04" => "В",
    "#05" => "Г",
    "#06" => "Д",
    "#07" => "Е",
    "#08" => "Ж",
    "#09" => "З",
    "#10" => "И",
    "#11" => "К",
    "#12" => "Л",
    "#13" => "М",
    "#14" => "Н",
    "#15" => "О",
    "#16" => "П",
    "#17" => "Р",
    "#18" => "С",
    "#19" => "Т",
    "#20" => "У",
    "#21" => "Ф",
    "#22" => "Х",
    "#23" => "Ц",
    "#24" => "Ч",
    "#25" => "Ш",
    "#26" => "Щ",
    "#27" => "Ю",
    "#28" => "Я",
);
?>
<div id="sia-dictionar">
    <div>
        <h2>КРАТКИЙ ЦЕРКОВНОСЛАВЯНСКИЙ СЛОВАРЬ</h2>
        <?php
        echo '<div class="oglavlenie">';
        foreach ($letters as $ids => $lettery) {
            for ($s = 0; $s < 1; $s++) {
                if (isset($ids[$s])) {
                    $id[$s] = $ids;
                    $letter[$s] = $lettery;
                    echo '&nbsp;&nbsp;&nbsp;<a href="' . $id[$s] . '">' . $letter[$s] . '</a>';
                }
            }
        }
        echo '</div>';
        ?>
        <p>&nbsp;</p>
        <input id="search" type="search" name="search" placeholder="Поиск..." type="text" data-list=".list">
        <ul class="list">
            <?php
            require_once ('arr.php');
            $const1 = ' &ndash; <span class="descr">';
            $const2 = '</span>';

            echo '<h3 id="02">А</h3>';
            foreach ($b02 as $key => $ids02) {
                $trans[$s] = $ids02["0"];
                $title[$s] = $key;
                $descr[$s] = $ids02["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="03">Б</h3>';
            foreach ($b03 as $key => $ids03) {
                $trans[$s] = $ids03["0"];
                $title[$s] = $key;
                $descr[$s] = $ids03["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="04">В</h3>';
            foreach ($b04 as $key => $ids04) {
                $trans[$s] = $ids04["0"];
                $title[$s] = $key;
                $descr[$s] = $ids04["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="05">Г</h3>';
            foreach ($b05 as $key => $ids05) {
                $trans[$s] = $ids05["0"];
                $title[$s] = $key;
                $descr[$s] = $ids05["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="06">Д</h3>';
            foreach ($b06 as $key => $ids06) {
                $trans[$s] = $ids06["0"];
                $title[$s] = $key;
                $descr[$s] = $ids06["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="07">Е</h3>';
            foreach ($b07 as $key => $ids07) {
                $trans[$s] = $ids07["0"];
                $title[$s] = $key;
                $descr[$s] = $ids07["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="08">Ж</h3>';
            foreach ($b08 as $key => $ids08) {
                $trans[$s] = $ids08["0"];
                $title[$s] = $key;
                $descr[$s] = $ids08["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="09">З</h3>';
            foreach ($b09 as $key => $ids09) {
                $trans[$s] = $ids09["0"];
                $title[$s] = $key;
                $descr[$s] = $ids09["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="10">И</h3>';
            foreach ($b10 as $key => $ids10) {
                $trans[$s] = $ids10["0"];
                $title[$s] = $key;
                $descr[$s] = $ids10["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="11">К</h3>';
            foreach ($b11 as $key => $ids11) {
                $trans[$s] = $ids11["0"];
                $title[$s] = $key;
                $descr[$s] = $ids11["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="12">Л</h3>';
            foreach ($b12 as $key => $ids12) {
                $trans[$s] = $ids12["0"];
                $title[$s] = $key;
                $descr[$s] = $ids12["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="13">М</h3>';
            foreach ($b13 as $key => $ids13) {
                $trans[$s] = $ids13["0"];
                $title[$s] = $key;
                $descr[$s] = $ids13["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="14">Н</h3>';
            foreach ($b14 as $key => $ids14) {
                $trans[$s] = $ids14["0"];
                $title[$s] = $key;
                $descr[$s] = $ids14["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="15">О</h3>';
            foreach ($b15 as $key => $ids15) {
                $trans[$s] = $ids15["0"];
                $title[$s] = $key;
                $descr[$s] = $ids15["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="16">П</h3>';
            foreach ($b16 as $key => $ids16) {
                $trans[$s] = $ids16["0"];
                $title[$s] = $key;
                $descr[$s] = $ids16["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="17">Р</h3>';
            foreach ($b17 as $key => $ids17) {
                $trans[$s] = $ids17["0"];
                $title[$s] = $key;
                $descr[$s] = $ids17["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="18">С</h3>';
            foreach ($b18 as $key => $ids18) {
                $trans[$s] = $ids18["0"];
                $title[$s] = $key;
                $descr[$s] = $ids18["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="19">Т</h3>';
            foreach ($b19 as $key => $ids19) {
                $trans[$s] = $ids19["0"];
                $title[$s] = $key;
                $descr[$s] = $ids19["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="20">У</h3>';
            foreach ($b20 as $key => $ids20) {
                $trans[$s] = $ids20["0"];
                $title[$s] = $key;
                $descr[$s] = $ids20["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="21">Ф</h3>';
            foreach ($b21 as $key => $ids21) {
                $trans[$s] = $ids21["0"];
                $title[$s] = $key;
                $descr[$s] = $ids21["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="22">Х</h3>';
            foreach ($b22 as $key => $ids22) {
                $trans[$s] = $ids22["0"];
                $title[$s] = $key;
                $descr[$s] = $ids22["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="23">Ц</h3>';
            foreach ($b23 as $key => $ids23) {
                $trans[$s] = $ids23["0"];
                $title[$s] = $key;
                $descr[$s] = $ids23["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="24">Ч</h3>';
            foreach ($b24 as $key => $ids24) {
                $trans[$s] = $ids24["0"];
                $title[$s] = $key;
                $descr[$s] = $ids24["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="25">Ш</h3>';
            foreach ($b25 as $key => $ids25) {
                $trans[$s] = $ids25["0"];
                $title[$s] = $key;
                $descr[$s] = $ids25["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="26">Щ</h3>';
            foreach ($b26 as $key => $ids26) {
                $trans[$s] = $ids26["0"];
                $title[$s] = $key;
                $descr[$s] = $ids26["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="27">Ю</h3>';
            foreach ($b27 as $key => $ids27) {
                $trans[$s] = $ids27["0"];
                $title[$s] = $key;
                $descr[$s] = $ids27["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }

            echo '<h3 id="28">Я</h3>';
            foreach ($b28 as $key => $ids28) {
                $trans[$s] = $ids28["0"];
                $title[$s] = $key;
                $descr[$s] = $ids28["1"];
                echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
            }
            ?>
        </ul>
    </div>
</div>
<?php
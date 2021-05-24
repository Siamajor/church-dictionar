<?php
/*
    Plugin Name: Church Slavonic Dictionary
    Plugin URI: https://github.com/Siamajor/church-dictionar
    Description: Церковнославянский словарь
    Author: SIA
    Version: 1.10
    Author URI: https://github.com/Siamajor
    License:     GPL2
    Text Domain: saints
    Domain Path: /languages
*/

/*  Copyright 2021  Igor Soloshenko  (email: siamajor@ukr.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
defined('ABSPATH') or die();

add_action('wp_enqueue_scripts', 'sia_chdc_style');
function sia_chdc_style()
{
    wp_enqueue_style('sia_chdc_style', plugins_url('css/sia_chdc.css', __FILE__));
}

add_action('admin_enqueue_scripts', 'sia_chdc_admin_style');
function sia_chdc_admin_style()
{
    wp_enqueue_style('sia_chdc_admin_style', plugins_url('admin/css/sia_chdc_admin.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'sia_chdc');
function sia_chdc()
{
    wp_enqueue_script('sia_chdc', plugins_url('js/sia_chdc.js', __FILE__));
    // wp_localize_script('sia_saints', 'adminurl', array('url_admin' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'sia_hideseek');
function sia_hideseek()
{
    wp_enqueue_script('sia_hideseek', plugins_url('js/jquery.hideseek.min.js', __FILE__));
}

add_action('admin_enqueue_scripts', 'sia_chdc_admin');
function sia_chdc_admin()
{
    wp_enqueue_script('sia_chdc_admin', plugins_url('admin/js/sia_chdc_admin.js', __FILE__));
}

add_action('fileshow', 'incl');
function incl()
{
    include_once('arr.php');
}


//** админка */
add_action('admin_menu', 'add_chdc_page');
function add_chdc_page()
{
    add_options_page('Настройки плагина Church Dictionar', 'Church Dictionar', 'manage_options', 'chdc_option', 'chdc_options_page_output');
}

include_once('admin/sia_chdc_admin.php');
add_action('admin_init', 'chdc_plugin_settings');

function chdc_options_page_output()
{
?>
    <div class="wrap">
        <h2><?php echo get_admin_page_title() ?></h2>
        <form action="options.php" method="POST">
            <?php
            settings_fields('option_group');     // скрытые защитные поля
            do_settings_sections('chdc_page'); // секции с настройками (опциями).
            submit_button();
            ?>
        </form>
    </div>
<?php
}


//*** [sia-chdc] */
add_shortcode('sia-chdc', 'sia_schdc');
function sia_schdc()
{
    include('arr.php');
    $letters = array(
        "#1" => "А", "#2" => "Б", "#3" => "В", "#4" => "Г", "#5" => "Д", "#6" => "Е", "#7" => "Ж", "#8" => "З", "#9" => "И", "#10" => "К", "#11" => "Л", "#12" => "М",  "#13" => "Н", "#14" => "О", "#15" => "П", "#16" => "Р", "#17" => "С", "#18" => "Т", "#19" => "У", "#20" => "Ф", "#21" => "Х", "#22" => "Ц", "#23" => "Ч", "#24" => "Ш", "#25" => "Щ", "#26" => "Ю", "#27" => "Я"
    );
    $s = 0;
    $all = 0;
    $val = get_option('chdc_option');
    if (isset($val['chdc_titleDic'])) {
        $titleDic = sanitize_text_field($val['chdc_titleDic']);
    } else {
        $titleDic = '';
    }
    if (isset($val['chdc_search'])) {
        $search = $val['chdc_search'];
    } else {
        $search = '';
    }
?>
    <div id="sia-dictionar">
        <div>
            <h2><?php echo $titleDic; ?></h2>
            <?php
            if (isset($val['chdc_alfavit'])) {
                $alfavit = $val['chdc_alfavit'];
            } else {
                $alfavit = '';
            }
            if ($alfavit) {
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
            }
            if ($search) {
            ?>
                <br />
                <input id="search" type="search" name="search" placeholder="Поиск..." type="text" data-list=".list">
            <?php }
            ?>
            <ul class="list">
                <?php

                $const1 = ' &ndash; <span class="descr">';
                $const2 = '</span>';

                $ti = array(1 => "А", 2 => "Б", 3 => "В", 4 => "Г", 5 => "Д", 6 => "Е", 7 => "Ж", 8 => "З", 9 => "И", 10  => "К", 11  => "Л", 12  => "М", 13  => "Н", 14  => "О", 15  => "П", 16  => "Р", 17  => "С", 18  => "Т", 19  => "У", 20  => "Ф", 21  => "Х", 22  => "Ц", 23  => "Ч", 24  => "Ш", 25  => "Щ", 26  => "Ю", 27  => "Я");
                $li = array(1 => $b02, 2 => $b03, 3 => $b04, 4 => $b05, 5 => $b05, 6 => $b07, 7 => $b08, 8 => $b09, 9 => $b10, 10 => $b11, 11 => $b12, 12 => $b13, 13 => $b14, 14 => $b15, 15 => $b16, 16 => $b17, 17 => $b18, 19 => $b20, 20 => $b21, 21 => $b22, 22 => $b23, 23 => $b24, 24 => $b25, 25 => $b26, 26 => $b26, 27 => $b28);

                for ($z = 1; $z < 28; $z++) {
                    if (isset($li[$z])) {
                        echo '<h3 id="' . $z . '">' . $ti[$z] . '</h3>';
                        foreach ($li[$z] as $key => $ids) {
                            $trans[$s] = $ids["0"];
                            $title[$s] = $key;
                            $descr[$s] = $ids["1"];
                            echo '<p>' . $title[$s] . ' ' . $trans[$s] . $const1 . $descr[$s] . $const2 . '</p>';
                            $all += 1;
                        }
                    }
                }
                $dt = wp_date('j F Y');
                echo '<div class="all-word">На ' . $dt . 'г. в словаре <strong>' . $all . '</strong> слов</div>';
                ?>
            </ul>
        </div>
    </div>
<?php
}

//*** активация */
function sia_chdc_activate()
{
    update_option('chdc_titleDic', 'КРАТКИЙ ЦЕРКОВНОСЛАВЯНСКИЙ СЛОВАРЬ');
    update_option('chdc_search', 1);
    update_option('chdc_alfavit', 1);

    load_plugin_textdomain('church-dictionar', FALSE, basename(dirname(__FILE__)) . '/languages/');
}
register_activation_hook(__FILE__, 'sia_chdc_activate');
activate_plugins('church-dictionar/sia-chdc.php');

## Очистка данных
function chdc_sanitize_callback($options)
{
    foreach ($options as $name => &$val) {
        if ($name == 'chdc_titleDic')
            $val = strip_tags($val);
        if ($name == 'chdc_search')
            $val = intval($val);
        if ($name == 'chdc_alfavit')
            $val = intval($val);
    }
    return $options;
}

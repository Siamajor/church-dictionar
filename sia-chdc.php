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
if (!defined('ABSPATH')) {
    die('Sorry, you are not allowed to access this page directly.');
}

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
    include_once ('sia_chdc_text.php');
   
}

//*** активация */
// function sia_chdc_activate()
// {
//     load_plugin_textdomain( 'church-dictionar', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
// }
register_activation_hook(__FILE__, 'sia_chdc_activate');
activate_plugins('church-dictionar/sia-chdc.php');

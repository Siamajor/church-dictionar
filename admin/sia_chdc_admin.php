<?php
/*
    Plugin Name: CHDC
	Admin page
    Author URI: https://github.com/Siamajor
    License:     GPL2
*/
if (!defined('ABSPATH')) {
    die('Sorry, you are not allowed to access this page directly.');
}

/**
 * Регистрируем настройки.
 */
function chdc_plugin_settings()
{
    // параметры: $option_group, $chdc_option, $chdc_sanitize_callback
    register_setting('option_group', 'chdc_option', 'chdc_sanitize_callback');

    // секция
    add_settings_section('section_id1', '', '', 'chdc_page');

    // поля
    add_settings_field('chdc_field_text', '', 'fill_chdc_field_text', 'chdc_page', 'section_id1');
    add_settings_field('chdc_field1', __('Заголовок блока с описаниями', 'church-dictionar'), 'fill_chdc_field1', 'chdc_page', 'section_id1');
    add_settings_field('chdc_field_shortinfo', __('Краткая информация', 'church-dictionar'), 'fill_chdc_field_shortinfo', 'chdc_page', 'section_id1');
    add_settings_field('chdc_field_about', '', 'fill_chdc_field_about', 'chdc_page', 'section_id1');
}
function fill_chdc_field_text()
{echo '<div class="sia-chdc">';

    $textTop = __('Этот плагин делает небольшую, но важную работу: выводит на странице краткий церковнославянский словарь, включающий более 2500 слов.<br/><span style="font-size: x-small;">Источник текста: Православие и мир</span>', 'church-dictionar');


?>
    <input type="hidden" name="chdc_option[textTop]" value="<?php echo esc_attr($textTop) ?>" />
    <div class="chdc-attention_admin_succ"><?php echo $textTop; ?></div>
<?php
}


## текст поле
function fill_chdc_field1()
{
    $val = get_option('chdc_option');
    $titleOpt = $val ? $val['titleOpt'] : null;
    $plshldTitle = 'Заголовок';
    $titleNull = __('Если оставить пустым не будет выводится', 'church-dictionar');
?>
    <div class="sia">
        <div class="form-group">
            <input type="text" name="chdc_option[titleOpt]" placeholder="<?php echo $plshldTitle; ?>" value="<?php echo esc_attr($titleOpt) ?>" />
            <div class="sinput"><label class="input-label" for="chdc_option[titleOpt]"><?php echo $titleNull; ?></label></div>
        </div>
    </div>
<?php
}

function fill_chdc_field_shortinfo()
{
    $val = get_option('chdc_option');
    if (isset($val['shortinfo'])) {
        $shortinfo = $val['shortinfo'];
    } else {
        $shortinfo = '';
    }
    $pokinfo = __(' показывать информацию', 'church-dictionar');
    $esinfo = __('Если отмечено, после заголовка будет показана краткая<br/>информация на выбранный день<br />Также можно краткую информацию получить<br/>с помощью шорткода [shortinfo] ', 'church-dictionar');
?>
    <div class="sia-chdc">
        <label class="checkbox"><input type="checkbox" name="chdc_option[shortinfo]" value="1" <?php checked(1, $shortinfo) ?> /><span><em><strong><?php echo $pokinfo; ?></strong></em></span></label>
        <div><?php echo $esinfo; ?></div>
    </div>
<?php

}
function fill_chdc_field_about () {
    $myphoto = '<img src="' . plugins_url('church-dictionar/admin/css/435.png') . '" class="imgmy">';
    
echo '<div class="chdc-attention_admin">';
echo $myphoto; 
$rightbl = '<h4 style="text-align:center;">Спасибо за проявленный интерес к плагину Church Slavonic Dictionary!</h4>
Дорогие братия и сестры!<br />Надеюсь, что мой плагин окажется для Вас полезным!<br />Плагин выводит на странице с установленным шорткодом<br/><strong>[sia-chdc]</strong><br/>краткий церковнославянский словарь с формой поиска.
<br />Если у Вас возникли вопросы или пожелания, вы можете направить их на siamajor@ukr.net<br/><strong>Береги Вас Господь!</strong>';

echo $rightbl;
echo '</div></div>';
}

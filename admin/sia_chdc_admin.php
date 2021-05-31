<?php
/*

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
    register_setting('chdc_dic', 'chdc_option', 'chdc_sanitize_callback');

    // секция
    add_settings_section('section_id1', '', '', 'chdc_page');

    // поля
    add_settings_field('chdc_field_text', '', 'fill_chdc_field_text', 'chdc_page', 'section_id1');

    add_settings_field('chdc_field1', __('Заголовок блока с описаниями', 'church-dictionary'), 'fill_chdc_field1', 'chdc_page', 'section_id1');

    add_settings_field('chdc_field_search', __('Поиск', 'church-dictionary'), 'fill_chdc_field_search', 'chdc_page', 'section_id1');

    add_settings_field('chdc_field_alfavit', __('Алфавитный указатель', 'church-dictionary'), 'fill_chdc_field_alfavit', 'chdc_page', 'section_id1');

    add_settings_field('chdc_field_about', '', 'fill_chdc_field_about', 'chdc_page', 'section_id1');
}
function fill_chdc_field_text()
{
    echo '<div class="sia-chdc">';

    $textTop = __("Этот плагин делает небольшую, но важную работу: выводит на странице краткий церковнославянский словарь  с формой поиска и алфавитным указателем<br/><span style='font-size: x-small;'>Источник описаний: Православие и мир</span>", 'church-dictionary');


?>
    <input type="hidden" name="chdc_option[textTop]" value="<?php echo esc_attr($textTop) ?>" />
    <div class="chdc-attention_admin_succ"><?php echo $textTop; ?></div>
<?php
}


## текст поле
function fill_chdc_field1()
{
    $val = get_option('chdc_option');
    $titleOpt = $val ? $val['chdc_titleDic'] : null;
    $plshldTitle = __('Заголовок', 'church-dictionary');
    $titleNull = __('Например, КРАТКИЙ ЦЕРКОВНОСЛАВЯНСКИЙ СЛОВАРЬ<br/>Если оставить пустым не будет выводится', 'church-dictionary');
?>
    <div class="sia">
        <div class="form-group">
            <input type="text" name="chdc_option[chdc_titleDic]" placeholder="<?php echo $plshldTitle; ?>" value="<?php echo esc_attr($titleOpt) ?>" />
            <div class="sinput"><label class="input-label" for="chdc_option[chdc_titleDic]"><?php echo $titleNull; ?></label></div>
        </div>
    </div>
<?php
}

function fill_chdc_field_search()
{
    $val = get_option('chdc_option');
    if (isset($val['chdc_search'])) {
        $search = $val['chdc_search'];
    } else {
        $search = '';
    }
    $pokinfo = __(' показывать поле поиска', 'church-dictionary');
    $esinfo = __('Если отмечено, будет показано поле для поиска ', 'church-dictionary');
?>
    <div class="sia-chdc">
        <label class="checkbox"><input type="checkbox" name="chdc_option[chdc_search]" value="1" <?php checked(1, $search) ?> /><span><em><strong><?php echo $pokinfo; ?></strong></em></span></label>
        <div><?php echo $esinfo; ?></div>
    </div>
<?php
}

function fill_chdc_field_alfavit()
{
    $val = get_option('chdc_option');
    if (isset($val['chdc_alfavit'])) {
        $alfavit = $val['chdc_alfavit'];
    } else {
        $alfavit = '';
    }
    $pokinfo2 = __(' показывать алфавитный указатель', 'church-dictionary');
    $esinfo2 = __('Если отмечено, будет показан алфавитный указатель', 'church-dictionary');
?>
    <div class="sia-chdc">
        <label class="checkbox"><input type="checkbox" name="chdc_option[chdc_alfavit]" value="1" <?php checked(1, $alfavit) ?> /><span><em><strong><?php echo $pokinfo2; ?></strong></em></span></label>
        <div><?php echo $esinfo2; ?></div>
    </div>
<?php

}

function fill_chdc_field_about()
{
    $chdc_myphoto = '<img src="' . plugins_url('church-dictionary/admin/435.png') . '" class="chdc-imgmy">';

    echo '<div class="chdc-attention_admin">';

    $chdc_rightbl1 = __("<h4 style='text-align:center;'>Спасибо за проявленный интерес к плагину Church Slavonic Dictionary!</h4>Дорогие братия и сестры!<br />Надеюсь, что мой плагин окажется для Вас полезным!<br />Плагин выводит на странице с установленным шорткодом<br/><strong>[sia-chdc]</strong><br/>краткий церковнославянский словарь.", 'names-saints');
    $chdc_rightbl2 = __("Если у Вас возникли вопросы или пожелания, вы можете направить их на siamajor@ukr.net<br/><strong>Береги Вас Господь!</strong>", 'names-saints');

echo '<div id="chdc-rightbl">
<div>' .  $chdc_rightbl1 . '</div><div>' . $chdc_myphoto . '</div><div>' . $chdc_rightbl2 . '</div>
</div>';

    echo '</div></div>';
}

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

<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\Style;
$params         = $this->params;
$style = $this->style;
$style_dark = $this->style_dark;
$title          = $params->get('title', '');
$html_element   = $params->get('html_element', 'h2');
$font_style     = $params->get('font_style', null);
$use_link       = $params->get('use_link', 0);
$link           = $params->get('link', '');
$add_icon       = $params->get('add_icon', 0);
$icon           = $params->get('icon', '');
$icon_color     = Style::getColor($params->get('icon_color', ''));
$style->child('.moon-icon')->addCss('color', $icon_color['light']);
$style_dark->child('.moon-icon')->addCss('color', $icon_color['dark']);
if (!empty($title)) {
    if ($use_link) {
        echo '<a href="'.$link.'" title="'.$title.'">';
    }
    echo '<'.$html_element.' class="heading">'. ($add_icon && $icon ? '<i class="'.$icon.' moon-icon me-2"></i>' : '') . $title . '</'.$html_element.'>';
    if ($use_link) {
        echo '</a>';
    }
}
if (!empty($font_style)) {
    Style::renderTypography('#'.$this->id.' .heading', $font_style, null, $this->isRoot);
}
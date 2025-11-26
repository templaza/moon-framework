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

$title_heading_margin=  $params->get('title_heading_margin', '');

// Meta
$meta = $params->get('meta_text', '');
$meta_font_style     = $params->get('meta_font_style', null);
$meta_heading_margin=  $params->get('meta_heading_margin', '');
$meta_position=  $params->get('meta_position', 'before');
if (!empty($title)) {
    if ($meta_position == 'before') {
        echo '<div class="heading-meta">'.$meta.'</div>';
    }
    if ($use_link) {
        echo '<a href="'.$link.'" title="'.$title.'">';
    }
    echo '<'.$html_element.' class="heading">'. ($add_icon && $icon ? '<i class="'.$icon.' moon-icon me-2"></i>' : '') . $title . '</'.$html_element.'>';
    if ($use_link) {
        echo '</a>';
    }
    if ($meta_position == 'after') {
        echo '<div class="heading-meta">'.$meta.'</div>';
    }
}
if (!empty($font_style)) {
    Style::renderTypography('#'.$this->id.' .heading', $font_style, null, $this->isRoot);
}
if (!empty($title_heading_margin)) {
    Style::setSpacingStyle($this->style->child('.heading'), $title_heading_margin, 'margin');
}

if (!empty($meta_font_style)) {
    Style::renderTypography('#'.$this->id.' .heading-meta', $meta_font_style, null, $this->isRoot);
}
if (!empty($meta_heading_margin)) {
    Style::setSpacingStyle($this->style->child('.heading-meta'), $meta_heading_margin, 'margin');
}
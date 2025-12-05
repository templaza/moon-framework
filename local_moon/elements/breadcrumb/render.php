<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\Style;
global $PAGE;
$show_heading = (int) $this->params->get('show_heading', 1);
$pagetitle = $show_heading ? '<h2 class="breadcrumb-heading">' . $PAGE->heading . '</h2>' : '';
$breadcrumbs = $PAGE->navbar->get_items();
$breadcrumb_html = '<nav aria-label="breadcrumb">';
$breadcrumb_html .= '<ol class="breadcrumb">';
foreach ($breadcrumbs as $key => $item) {
    $url = $item->action instanceof moodle_url ? $item->action->out() : '';
    $text = !empty($url) && $key < count($breadcrumbs) - 1 ? '<a href="' . $url . '">' . $item->text . '</a>' : '<span>' . $item->text . '</span>';
    if ($key == count($breadcrumbs) - 1) {
        $breadcrumb_html .= '<li class="breadcrumb-item active" aria-current="page">' . $text . '</li>';
    } else {
        $breadcrumb_html .= '<li class="breadcrumb-item">' . $text . '</li>';
    }
}
$breadcrumb_html .= '</ol>';
$breadcrumb_html .= '</nav>';
echo "<div class='pageinfo-block'>{$pagetitle}{$breadcrumb_html}</div>";

$heading_font_style   =   $this->params->get('heading_font_style');
if (!empty($heading_font_style)) {
    Style::renderTypography('#'.$this->id.' .breadcrumb-heading', $heading_font_style, null, $this->isRoot);
}

$content_font_style =   $this->params->get('content_font_style');
if (!empty($content_font_style)) {
    Style::renderTypography('#'.$this->id.' .breadcrumb-item > *', $content_font_style, null, $this->isRoot);
}
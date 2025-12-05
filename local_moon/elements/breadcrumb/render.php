<?php
defined('MOODLE_INTERNAL') || die;
global $PAGE;
$pagetitle = $PAGE->title;
$breadcrumbs = $PAGE->navbar->get_items();
$breadcrumb_html = '<nav class="breadcrumb">';
foreach ($breadcrumbs as $item) {
    $breadcrumb_html .= '<span class="breadcrumb-item">' . $item->text . '</span> &raquo; ';
}
$breadcrumb_html = rtrim($breadcrumb_html, ' &raquo; ');
$breadcrumb_html .= '</nav>';
echo "<div class='pageinfo-block'><h2>{$pagetitle}</h2>{$breadcrumb_html}</div>";
<?php
defined('MOODLE_INTERNAL') || die;
global $PAGE;
$pagetitle = $PAGE->heading;
$breadcrumbs = $PAGE->navbar->get_items();
$breadcrumb_html = '<nav class="breadcrumb">';
foreach ($breadcrumbs as $item) {
    $url = $item->action instanceof moodle_url ? $item->action->out() : '';
    $breadcrumb_html .= '<a href="' . $url . '"><span class="breadcrumb-item">' . $item->text . '</span></a>';
}
$breadcrumb_html .= '</nav>';
echo "<div class='pageinfo-block'><h2>{$pagetitle}</h2>{$breadcrumb_html}</div>";
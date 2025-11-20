<?php
defined('MOODLE_INTERNAL') || die;
global $OUTPUT, $PAGE;
$renderer = $PAGE->get_renderer('core');
$header = $PAGE->activityheader;
$headercontent = $header->export_for_template($renderer);
if (empty($headercontent)) {
    return;
}
$enable_title = (int) $this->params->get('enable_heading_title', 0);
if (!$enable_title) {
    $headercontent['title'] = null;
}

echo $OUTPUT->render_from_template('core/activity_header', $headercontent);
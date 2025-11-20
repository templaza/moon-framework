<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Framework;
use local_moon\library\Helper\Header;
global $OUTPUT, $PAGE;

$primary = new core\navigation\output\primary($PAGE);
$renderer = $PAGE->get_renderer('core');
$primarymenu = $primary->export_for_template($renderer);

$theme = Framework::getTheme();
$params = $theme->getParams();

$header = $params->get('header', TRUE);
$mode = $params->get('header_mode', 'horizontal');
$header_mode = [
    'is_horizontal' => $header && $mode === 'horizontal',
    'is_stacked' => $header && $mode === 'stacked',
    'is_sidebar' => $header && $mode === 'sidebar',
];
$header_options = new Header($mode);

$templatecontext = [
    'output' => $OUTPUT,
    'primarymoremenu' => $primarymenu['moremenu'],
    'mobileprimarynav' => $primarymenu['mobileprimarynav'],
    'usermenu' => $primarymenu['user'],
    'langmenu' => $primarymenu['lang'],
    'header_mode' => $header_mode,
    'header' => $header_options->getOptions()
];

echo $OUTPUT->render_from_template('local_moon/header', $templatecontext);
<?php
defined('MOODLE_INTERNAL') || die;
global $OUTPUT, $PAGE;
$menu_type = $this->params->get('menu_type', 'secondary');
if ($menu_type == 'secondary' && $PAGE->has_secondary_navigation()) {
    $tablistnav = $PAGE->has_tablist_secondary_navigation();
    $moremenu = new \core\navigation\output\more_menu($PAGE->secondarynav, 'nav-tabs', true, $tablistnav);
    $secondarynavigation = $moremenu->export_for_template($OUTPUT);
    echo '<div class="secondary-navigation">' . $OUTPUT->render_from_template('core/moremenu', $secondarynavigation) . '</div>';
} elseif ($menu_type == 'primary') {
    $primary = new \core\navigation\output\primary($PAGE);
    $primarymenu = $primary->export_for_template($OUTPUT);
    echo $OUTPUT->render_from_template('core/moremenu', $primarymenu['moremenu']);
}
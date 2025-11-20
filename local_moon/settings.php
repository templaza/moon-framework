<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage('local_moon', get_string('pluginname', 'local_moon'));
    $settings->add(new admin_setting_heading('local_moon_heading', '', get_string('settings_desc', 'local_moon')));
    $ADMIN->add('localplugins', $settings);
}

<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementActivity_Navigation extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'activity_navigation',
            'title' => 'Activity Navigation',
            'description' => 'Activity Navigation Section',
            'icon' => 'as-icon as-icon-tab',
            'category' => 'system',
            'element_type' => 'system',
            'multiple' => false,
        ]);
    }
}
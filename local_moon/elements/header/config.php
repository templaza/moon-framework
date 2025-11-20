<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementHeader extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'header',
            'title' => 'Header',
            'description' => 'Header of Moodle',
            'icon' => 'as-icon as-icon-window',
            'category' => 'system',
            'element_type' => 'system',
            'multiple' => false,
        ]);
    }
}
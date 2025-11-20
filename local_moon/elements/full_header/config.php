<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementFull_Header extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'full_header',
            'title' => 'Full Header',
            'description' => 'Full Header of Moodle',
            'icon' => 'fas fa-header',
            'category' => 'system',
            'element_type' => 'system',
            'multiple' => false,
        ]);
    }
}
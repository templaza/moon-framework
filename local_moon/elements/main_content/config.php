<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementMain_Content extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'main_content',
            'title' => 'Main Content',
            'description' => 'Main Content of Moodle',
            'icon' => 'fa-solid fa-house',
            'category' => 'system',
            'element_type' => 'system',
            'multiple' => false,
        ]);
    }
}
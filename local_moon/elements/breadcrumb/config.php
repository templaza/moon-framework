<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementBreadcrumb extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'breadcrumb',
            'title' => 'Breadcrumb',
            'description' => 'Breadcrumb of Moodle',
            'icon' => 'fa-solid fa-forward-fast',
            'category' => 'system',
            'element_type' => 'system',
            'multiple' => false,
        ]);
    }
}
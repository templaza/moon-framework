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
    public function setFields(): void {
        $this->setFieldSet('general-settings');
        $this->addField('show_heading', [
            "group"   => "general",
            "type"    => "radio",
            "default" => "1",
            "attributes" => [
                "role" => "switch"
            ],
            "label"   => "show_heading",
        ]);
    }
}
<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
use local_moon\library\Framework;
class MoonElementMenu extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'menu',
            'title' => 'Menu',
            'description' => 'Menu of Moodle',
            'icon' => 'fa-solid fa-puzzle-piece',
            'category' => 'system',
            'element_type' => 'system',
        ]);
    }
    public function setFields(): void {
        $this->setFieldSet('general-settings');
        $this->addField( 'menu_type',  [
            "group" => "general",
            "type" => "list",
            "label" => "menu_type",
            "description" => "menu_type_desc",
            "default" => "secondary",
            "options" => [
                "primary" => "primary",
                "secondary" => "secondary",
            ]
        ]);
    }
}
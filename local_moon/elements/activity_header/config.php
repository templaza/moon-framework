<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementActivity_Header extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'activity_header',
            'title' => 'Activity Header',
            'description' => 'Activity Header Section',
            'icon' => 'as-icon as-icon-notification-circle',
            'category' => 'system',
            'element_type' => 'system',
            'multiple' => false,
        ]);
    }
    public function setFields(): void {
        $this->setFieldSet('general-settings');
        $this->addField( 'enable_heading_title',  [
            "group" => "general",
            "type" => "radio",
            "label" => "enable_heading_title",
            "description" => "enable_heading_title_desc",
            "default" => 0,
            "attributes" => [
                "role" => "switch"
            ]
        ]);
    }
}
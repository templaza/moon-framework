<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementRow extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'row',
            'title' => 'row',
            'description' => 'Row layout of Moodle',
        ]);
    }

    public function setFields() : void
    {
        $this->setFieldSet('general-settings');
        $this->addField('layout_type', [
            "type" => "list",
            "label" => "layout_type",
            'default' => '',
            'options' => [
                '' => 'JDEFAULT',
                'container' => 'ASTROID_CONTAINER',
                'container-fluid' => 'ASTROID_CONTAINER_FLUID',
                'container-with-no-gutters' => 'ASTROID_CONTAINER_WITH_NO_GUTTERS',
                'container-fluid-with-no-gutters' => 'ASTROID_CONTAINER_FLUID_WITH_NO_GUTTERS',
                'no-container' => 'ASTROID_ELEMENT_LAYOUT_SECTION_LAYOUT_OPTIONS_WITHOUT_CONTAINER',
                'custom-container' => 'ASTROID_ELEMENT_LAYOUT_SECTION_LAYOUT_OPTIONS_CUSTOM',
            ],
        ]);
    }
}
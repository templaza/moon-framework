<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
use local_moon\library\Framework;
class MoonElementBlocks extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'block',
            'title' => 'Blocks',
            'description' => 'Blocks of Moodle',
            'icon' => 'as-icon as-icon-puzzle',
            'category' => 'system',
            'element_type' => 'system',
        ]);
    }
    public function setFields(): void {
        $this->setFieldSet('general-settings');
        $this->addField( 'region',  [
            "group" => "general",
            "type" => "regions",
            "label" => "select_region",
            "description" => "select_region_desc"
        ]);
    }
}
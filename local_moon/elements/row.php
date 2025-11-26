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
        $this->setFieldSet('design-settings');

        $this->addField('moon_element_vertical_alignment', [
            "group"       => "general",
            "type"        => "list",
            "label"       => "vertical_alignment",
            "description" => "vertical_alignment_desc",
            "default"     => "",
            "options"     => [
                ""       => "inherit",
                "start"  => "top",
                "center" => "middle",
                "end"    => "bottom",
            ],
        ]);

        $this->addField('device_gutter_settings', [
            "type"        => "group",
            "label"       => "device_gutter_settings",
            "description" => "device_gutter_settings_desc",
        ]);

        $this->addField('gutter_xs', [
            "group"       => "device_gutter_settings",
            "type"        => "list",
            "label"       => "mobile_gutter",
            "description" => "mobile_gutter_desc",
            "default"     => "",
            "options"     => [
                "" => "inherit",
                "0" => "gx-0",
                "1" => "gx-1",
                "2" => "gx-2",
                "3" => "gx-3",
                "4" => "gx-4",
                "5" => "gx-5",
            ],
        ]);

        $this->addField('gutter_sm', [
            "group"       => "device_gutter_settings",
            "type"        => "list",
            "label"       => "small_gutter",
            "description" => "small_gutter_desc",
            "default"     => "",
            "options"     => [
                "" => "inherit",
                "0" => "gx-sm-0",
                "1" => "gx-sm-1",
                "2" => "gx-sm-2",
                "3" => "gx-sm-3",
                "4" => "gx-sm-4",
                "5" => "gx-sm-5",
            ],
        ]);

        $this->addField('gutter_md', [
            "group"       => "device_gutter_settings",
            "type"        => "list",
            "label"       => "medium_gutter",
            "description" => "medium_gutter_desc",
            "default"     => "",
            "options"     => [
                "" => "inherit",
                "0" => "gx-md-0",
                "1" => "gx-md-1",
                "2" => "gx-md-2",
                "3" => "gx-md-3",
                "4" => "gx-md-4",
                "5" => "gx-md-5",
            ],
        ]);

        $this->addField('gutter_lg', [
            "group"       => "device_gutter_settings",
            "type"        => "list",
            "label"       => "large_gutter",
            "description" => "large_gutter_desc",
            "default"     => "",
            "options"     => [
                "" => "inherit",
                "0" => "gx-lg-0",
                "1" => "gx-lg-1",
                "2" => "gx-lg-2",
                "3" => "gx-lg-3",
                "4" => "gx-lg-4",
                "5" => "gx-lg-5",
            ],
        ]);

        $this->addField('gutter_xl', [
            "group"       => "device_gutter_settings",
            "type"        => "list",
            "label"       => "xlarge_gutter",
            "description" => "xlarge_gutter_desc",
            "default"     => "",
            "options"     => [
                "" => "inherit",
                "0" => "gx-xl-0",
                "1" => "gx-xl-1",
                "2" => "gx-xl-2",
                "3" => "gx-xl-3",
                "4" => "gx-xl-4",
                "5" => "gx-xl-5",
            ],
        ]);

        $this->addField('gutter_xxl', [
            "group"       => "device_gutter_settings",
            "type"        => "list",
            "label"       => "xxlarge_gutter",
            "description" => "xxlarge_gutter_desc",
            "default"     => "",
            "options"     => [
                "" => "inherit",
                "0" => "gx-xxl-0",
                "1" => "gx-xxl-1",
                "2" => "gx-xxl-2",
                "3" => "gx-xxl-3",
                "4" => "gx-xxl-4",
                "5" => "gx-xxl-5",
            ],
        ]);
    }
}
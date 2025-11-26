<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementColumn extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'column',
            'title' => 'column',
            'description' => 'Column layout of Moodle',
        ]);
    }

    public function setFields() : void
    {
        $this->setFieldSet('design-settings');

        $this->addField('device_order_settings', [
            "type"  => "group",
            "label" => "device_order",
        ]);

        $this->addField('column_order_xl', [
            "group"   => "device_order_settings",
            "type"    => "list",
            "label"   => "xlarge_order",
            "default" => "0",
            "options" => [
                "0"  => "default",
                "1"  => "1",
                "2"  => "2",
                "3"  => "3",
                "4"  => "4",
                "5"  => "5",
                "6"  => "6",
                "7"  => "7",
                "8"  => "8",
                "9"  => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12",
            ],
        ]);

        $this->addField('column_order_lg', [
            "group"   => "device_order_settings",
            "type"    => "list",
            "label"   => "large_order",
            "default" => "0",
            "options" => [
                "0"  => "default",
                "1"  => "1",
                "2"  => "2",
                "3"  => "3",
                "4"  => "4",
                "5"  => "5",
                "6"  => "6",
                "7"  => "7",
                "8"  => "8",
                "9"  => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12",
            ],
        ]);

        $this->addField('column_order_md', [
            "group"   => "device_order_settings",
            "type"    => "list",
            "label"   => "medium_order",
            "default" => "0",
            "options" => [
                "0"  => "default",
                "1"  => "1",
                "2"  => "2",
                "3"  => "3",
                "4"  => "4",
                "5"  => "5",
                "6"  => "6",
                "7"  => "7",
                "8"  => "8",
                "9"  => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12",
            ],
        ]);

        $this->addField('column_order_sm', [
            "group"   => "device_order_settings",
            "type"    => "list",
            "label"   => "small_order",
            "default" => "0",
            "options" => [
                "0"  => "default",
                "1"  => "1",
                "2"  => "2",
                "3"  => "3",
                "4"  => "4",
                "5"  => "5",
                "6"  => "6",
                "7"  => "7",
                "8"  => "8",
                "9"  => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12",
            ],
        ]);

        $this->addField('column_order_xs', [
            "group"   => "device_order_settings",
            "type"    => "list",
            "label"   => "xsmall_order",
            "default" => "0",
            "options" => [
                "0"  => "default",
                "1"  => "1",
                "2"  => "2",
                "3"  => "3",
                "4"  => "4",
                "5"  => "5",
                "6"  => "6",
                "7"  => "7",
                "8"  => "8",
                "9"  => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12",
            ],
        ]);
    }
}
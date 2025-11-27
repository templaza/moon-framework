<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
use local_moon\library\Helper\Font;
class MoonElementVideo_Button extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'video_button',
            'title' => 'Video Button',
            'description' => 'Video Button Widget of Moodle',
            'icon' => 'as-icon as-icon-play',
            'category' => 'media',
            'element_type' => 'widget'
        ]);
    }
    public function setFields(): void {
        $this->setFieldSet('general-settings');

        $this->addField('widget_styles',  [
            "type" => "group",
            "label" => "widget_styles",
        ]);
        $this->addField('url',  [
            "group" => "general",
            "type" => "text",
            "label" => "link_url",
            "attributes" => [
                'hint' => 'https://www.youtube.com/watch?v=xxxxx'
            ],
            "dynamic" => true,
        ]);
        $this->addField('button_size', [
            "group"   => "widget_styles",
            "type"    => "list",
            "label"   => "button_size",
            "default" => "",
            "options" => [
                ""       => "default",
                "btn-lg" => "lg",
                "btn-sm" => "sm",
                "custom" => "custom",
            ],
        ]);

        $this->addField('button_font_style', [
            "group"      => "widget_styles",
            "conditions" => "[button_size]=='custom'",
            "label"      => "font_style",
            "type"       => "typography",
            "attributes" => [
                'options' => [
                    "colorpicker" => true,
                    'stylepicker' => false,
                    'fontpicker' => true,
                    'sizepicker' => true,
                    'letterspacingpicker' => true,
                    'lineheightpicker' => true,
                    'weightpicker' => true,
                    'transformpicker' => true,
                    'columns' => 1,
                    'preview' => false,
                    'collapse' => true,
                    'system_fonts' => Font::get_system_fonts(),
                    'text_transform_options' => Font::text_transform(),
                    'lang' => Font::font_properties(),
                ],
                'lang' => Font::font_properties(),
                'value' => Font::$get_default_font_value,
            ],
        ]);

        $this->addField('btn_padding', [
            "group"      => "widget_styles",
            "conditions" => "[button_size]=='custom'",
            "type"       => "spacing",
            "label"      => "padding",
        ]);

        $this->addField('btn_border_radius', [
            "group"   => "widget_styles",
            "type"    => "list",
            "label"   => "border_radius",
            "default" => "",
            "options" => [
                ""             => "rounded",
                "rounded-0"    => "square",
                "rounded-pill" => "circle",
            ],
        ]);

        $this->addField('gutter', [
            "conditions" => "[button_group]==0",
            "group"      => "widget_styles",
            "type"       => "list",
            "label"      => "gutter",
            "default"    => "lg",
            "options"    => [
                "sm"  => "sm",
                "md"  => "md",
                "lg"  => "lg",
                "xl"  => "xl",
                "xxl" => "xxl",
            ],
        ]);
    }
}
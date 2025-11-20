<?php
/**
 * @package   Moon Framework
 * @author    Moon Framework Team https://moonframe.work
 * @copyright Copyright (C) 2025 MoonFrame.work.
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 or Later
 */
defined('MOODLE_INTERNAL') || die;

use local_moon\library\Framework;
use local_moon\library\Helper\Constants;

Framework::getTheme()->addFields(
    'layout',
    [
        'label' => 'layout',
        'icon' => 'as-icon as-icon-layers',
        'order' => 3,
        'fields' => [
            // Group
            'layout_group' => ["type" => "group", "label" => "layout", "description" => "layout_desc", "option-type" => "tab"],
            'sub_layout_group' => ["type" => "group", "label" => "sub_layout", "description" => "sub_layout_desc", "option-type" => "tab"],

            // Page Settings
            'layout' => [
                "group" => "layout_group",
                "type" => "mainlayouts",
                "default" => Constants::getDefaultLayout()
            ],
            'astroidcontentlayouts' => [
                "group" => "layout_group",
                "type" => "hidden",
            ],
            'sublayout' => [
                "group" => "sub_layout_group",
                "type" => "layouts",
                "attributes" => [
                    "category" => "layouts",
                ],
            ],
        ]
    ]
);
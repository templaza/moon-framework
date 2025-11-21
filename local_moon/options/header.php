<?php
/**
 * @package   Moon Framework
 * @author    Moon Framework Team https://moonframe.work
 * @copyright Copyright (C) 2025 MoonFrame.work.
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 or Later
 */
defined('MOODLE_INTERNAL') || die;

use local_moon\library\Framework;

Framework::getTheme()->addFields(
    'header',
    [
        'label' => 'header',
        'icon' => 'as-icon as-icon-menu3',
        'order' => 2,
        'fields' => [
            'header_element' => [
                "type" => "group",
                "label" => "header",
                "description" => ""
            ],

            'header' => [
                "group" => "header_element",
                "type" => "radio",
                "label" => "enable_header",
                "description" => "",
                "default" => 1,
                "attributes" => [
                    "role" => "switch"
                ]
            ],

            'header_mode' => [
                "group" => "header_element",
                "type" => "radio",
                "label" => "header_mode",
                "description" => "header_mode_desc",
                "default" => 'horizontal',
                "attributes" => [
                    "role" => "image"
                ],
                "options" => [
                    'horizontal' => '/local/moon/assets/images/header/horizontal-left.svg',
                    'stacked' => '/local/moon/assets/images/header/stacked_style1.svg',
                    'sidebar' => '/local/moon/assets/images/header/sidebar-1.svg',
                ],
                "conditions" => "[header]==true"
            ],

            'header_horizontal_menu_mode' => [
                "group" => "header_element",
                "type" => "radio",
                "label" => "horizontal_menu_mode",
                "description" => "horizontal_menu_mode_desc",
                "default" => "left",
                "attributes" => [
                    "role" => "image"
                ],
                "options" => [
                    'left'   => '/local/moon/assets/images/header/horizontal-left.svg',
                    'center' => '/local/moon/assets/images/header/horizontal-center.svg',
                    'right'  => '/local/moon/assets/images/header/horizontal-right.svg',
                ],
                "conditions" => "[header]==true AND [header_mode]=='horizontal'",
            ],

            'header_sidebar_menu_mode' => [
                "group" => "header_element",
                "type" => "radio",
                "label" => "sidebar_menu_mode",
                "description" => "sidebar_menu_mode_desc",
                "default" => "left",
                "attributes" => [
                    "role" => "image"
                ],
                "options" => [
                    'left'   => '/local/moon/assets/images/header/sidebar-1.svg',
                    'right'  => '/local/moon/assets/images/header/sidebar-2.svg',
                    'topbar' => '/local/moon/assets/images/header/sidebar-topbar.svg',
                ],
                "conditions" => "[header]==true AND [header_mode]=='sidebar'",
            ],

            'header_stacked_menu_mode' => [
                "group" => "header_element",
                "type" => "radio",
                "label" => "stacked_menu_mode",
                "description" => "stacked_menu_mode_desc",
                "default" => "seperated",
                "attributes" => [
                    "role" => "image"
                ],
                "options" => [
                    'center-balance'     => '/local/moon/assets/images/header/stacked_style0.svg',
                    'center'             => '/local/moon/assets/images/header/stacked_style1.svg',
                    'seperated'          => '/local/moon/assets/images/header/stacked_style2.svg',
                    'divided'            => '/local/moon/assets/images/header/stacked_style3.svg',
                    'divided-logo-left'  => '/local/moon/assets/images/header/stacked_style4.svg',
                ],
                "conditions" => "[header]==true AND [header_mode]=='stacked'",
            ],

            'sidebar_position' => [
                "group" => "header_element",
                "type" => "radio",
                "label" => "sidebar_position",
                "description" => "sidebar_position_desc",
                "default" => "left",
                "options" => [
                    'left'  => 'left',
                    'right' => 'right',
                ],
                "conditions" => "[header]==true AND [header_mode]=='sidebar' AND [header_sidebar_menu_mode]=='topbar'",
            ],

            'divided_logo_width' => [
                "group" => "header_element",
                "type" => "range",
                "label" => "divided_logo_width",
                "description" => "divided_logo_width_desc",
                "default" => 200,
                "attributes" => [
                    "min" => 20,
                    "max" => 600,
                    "step" => 1,
                    "postfix" => "px",
                ],
                "conditions" => "[header]==true AND [header_mode]=='stacked' AND [header_stacked_menu_mode]=='divided-logo-left'",
            ],

            'odd_menu_items' => [
                "group" => "header_element",
                "type" => "radio",
                "label" => "odd_menu_items",
                "description" => "odd_menu_items_desc",
                "default" => "left",
                "options" => [
                    'left'  => 'left',
                    'right' => 'right',
                ],
                "conditions" => "[header]==true AND [header_mode]=='stacked' AND [header_stacked_menu_mode]=='seperated'",
            ],

            'header_block_1_type' => [
                'group' => 'header_element',
                'type' => 'list',
                'label' => 'TPL_ASTROID_HEADER_BLOCK_1_TYPE_LABEL',
                'description' => 'TPL_ASTROID_HEADER_BLOCK_1_TYPE_DESC',
                'default' => 'blank',
                'conditions' => "[header]==true",
                'options' => [
                    'blank'   => 'TPL_ASTROID_BLANK_OPTIONS',
                    'position'=> 'TPL_ASTROID_MODULE_POSITION_LABEL',
                    'custom'  => 'TPL_ASTROID_CUSTOM_HTML_OPTIONS',
                ],
            ],

            'header_block_1_position' => [
                'group' => 'header_element',
                'type' => 'regions',
                'label' => 'TPL_ASTROID_HEADER_BLOCK_1_POSITION_LABEL',
                'description' => 'TPL_ASTROID_HEADER_BLOCK_1_POSITION_DESC',
                'conditions' => "[header]==true AND [header_block_1_type]=='position'",
            ],

            'header_block_1_custom' => [
                'group' => 'header_element',
                'type' => 'textarea',
                'label' => 'TPL_ASTROID_HEADER_BLOCK_1_CUSTOM_LABEL',
                'description' => 'TPL_ASTROID_HEADER_BLOCK_1_CUSTOM_DESC',
                "attributes" => [
                    'filter' => 'raw',
                ],
                'conditions' => "[header]==true AND [header_block_1_type]=='custom'",
            ],

            'header_block_2_type' => [
                'group' => 'header_element',
                'type' => 'list',
                'label' => 'TPL_ASTROID_HEADER_BLOCK_2_TYPE_LABEL',
                'description' => 'TPL_ASTROID_HEADER_BLOCK_2_TYPE_DESC',
                'default' => 'blank',
                'conditions' => "[header]==true AND (([header_mode]=='stacked' AND [header_stacked_menu_mode]!='center') OR ([header_mode]=='horizontal') OR ([header_mode]=='sidebar'))",
                'options' => [
                    'blank'    => 'TPL_ASTROID_BLANK_OPTIONS',
                    'position' => 'TPL_ASTROID_MODULE_POSITION_LABEL',
                    'custom'   => 'TPL_ASTROID_CUSTOM_HTML_OPTIONS',
                ],
            ],

            'header_block_2_position' => [
                'group' => 'header_element',
                'type' => 'regions',
                'label' => 'TPL_ASTROID_HEADER_BLOCK_2_POSITION_LABEL',
                'description' => 'TPL_ASTROID_HEADER_BLOCK_2_POSITION_DESC',
                'conditions' => "[header]==true AND (([header_mode]=='stacked' AND [header_stacked_menu_mode]!='center') OR ([header_mode]=='horizontal') OR ([header_mode]=='sidebar')) AND [header_block_2_type]=='position'",
            ],

            'header_block_2_custom' => [
                'group' => 'header_element',
                'type' => 'textarea',
                'label' => 'TPL_ASTROID_HEADER_BLOCK_2_CUSTOM_LABEL',
                'description' => 'TPL_ASTROID_HEADER_BLOCK_2_CUSTOM_DESC',
                "attributes" => [
                    'filter' => 'raw',
                ],
                'conditions' => "[header]==true AND (([header_mode]=='stacked' AND [header_stacked_menu_mode]!='center') OR ([header_mode]=='horizontal') OR ([header_mode]=='sidebar')) AND [header_block_2_type]=='custom'",
            ],

            'header_block_3_type' => [
                'group' => 'header_element',
                'type' => 'list',
                'label' => 'TPL_ASTROID_HEADER_BLOCK_3_TYPE_LABEL',
                'description' => 'TPL_ASTROID_HEADER_BLOCK_3_TYPE_DESC',
                'default' => 'blank',
                'conditions' => "[header]==true AND (([header_mode]=='stacked' AND [header_stacked_menu_mode]=='divided-logo-left') OR ([header_mode]=='sidebar' AND [header_sidebar_menu_mode]=='topbar'))",
                'options' => [
                    'blank'    => 'TPL_ASTROID_BLANK_OPTIONS',
                    'position' => 'TPL_ASTROID_MODULE_POSITION_LABEL',
                    'custom'   => 'TPL_ASTROID_CUSTOM_HTML_OPTIONS',
                ],
            ],

            'header_block_3_position' => [
                'group' => 'header_element',
                'type' => 'regions',
                'label' => 'TPL_ASTROID_HEADER_BLOCK_3_POSITION_LABEL',
                'description' => 'TPL_ASTROID_HEADER_BLOCK_3_POSITION_DESC',
                'conditions' => "[header]==true AND (([header_mode]=='stacked' AND [header_stacked_menu_mode]=='divided-logo-left') OR ([header_mode]=='sidebar' AND [header_sidebar_menu_mode]=='topbar')) AND [header_block_3_type]=='position'",
            ],

            'header_block_3_custom' => [
                'group' => 'header_element',
                'type' => 'textarea',
                'label' => 'TPL_ASTROID_HEADER_BLOCK_3_CUSTOM_LABEL',
                'description' => 'TPL_ASTROID_HEADER_BLOCK_3_CUSTOM_DESC',
                "attributes" => [
                    'filter' => 'raw',
                ],
                'conditions' => "[header]==true AND (([header_mode]=='stacked' AND [header_stacked_menu_mode]=='divided-logo-left') OR ([header_mode]=='sidebar' AND [header_sidebar_menu_mode]=='topbar')) AND [header_block_3_type]=='custom'",
            ],
        ]
    ]
);
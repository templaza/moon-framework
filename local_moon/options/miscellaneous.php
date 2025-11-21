<?php
use local_moon\library\Framework;

Framework::getTheme()->addFields(
    'miscellaneous',
    [
        'label' => 'miscellaneous',
        'icon' => 'as-icon as-icon-palette',
        'order' => 7,
        'fields' => [
            'contact_info' => ["type" => "group", "label" => "contact_info", "description" => "contact_info_desc"],
            'contact_details' => [
                'group' => 'contact_info',
                'type' => 'radio',
                'label' => 'TPL_ASTROID_CONTACT_DEATILS_LABEL',
                'description' => 'TPL_ASTROID_CONTACT_DEATILS_DESC',
                'default' => 1,
                "attributes" => [
                    "role" => "switch"
                ]
            ],

            'contact_module_position' => [
                'group' => 'contact_info',
                'type' => 'regions',
                'label' => 'TPL_ASTROID_MODULE_POSITION_LABEL',
                'description' => 'TPL_ASTROID_MODULE_POSITION_DESC',
                "attributes" => [
                    'astroid_content_layout' => 'contactinfo',
                ],
                'conditions' => "[contact_details]=='1'",
            ],

            'contact_feature_load_position' => [
                'group' => 'contact_info',
                'type' => 'list',
                'label' => 'TPL_ASTROID_FEATURE_LOAD_POSITION_LABEL',
                'description' => 'TPL_ASTROID_FEATURE_LOAD_POSITION_DESC',
                "attributes" => [
                    'astroid_content_layout_load' => 'contact_module_position',
                ],
                'default' => 'after',
                'conditions' => "[contact_details]=='1'",
                'options' => [
                    'after' => 'TPL_ASTROID_AFTER_MODULE',
                    'before' => 'TPL_ASTROID_BEFORE_MODULE',
                ],
            ],

            'contact_address' => [
                'group' => 'contact_info',
                'type' => 'text',
                'label' => 'TPL_ASTROID_MISCELL_ADDRESS_LABEL',
                'description' => 'TPL_ASTROID_MISCELL_ADDRESS_DESC',
                "attributes" => [
                    'hint' => '15 Barnes Wallis Way, West Road, Chorley, USA',
                ],
                'conditions' => "[contact_details]=='1'",
            ],

            'contact_phone_number' => [
                'group' => 'contact_info',
                'type' => 'text',
                'label' => 'TPL_ASTROID_MISCELL_PHONE_NUMBER_LABEL',
                'description' => 'TPL_ASTROID_MISCELL_PHONE_NUMBER_DESC',
                "attributes" => [
                    'hint' => '+1 123 456 7890',
                ],
                'conditions' => "[contact_details]=='1'",
            ],

            'contact_mobile_number' => [
                'group' => 'contact_info',
                'type' => 'text',
                'label' => 'TPL_ASTROID_MISCELL_MOBILE_NUMBER_LABEL',
                'description' => 'TPL_ASTROID_MISCELL_MOBILE_NUMBER_DESC',
                "attributes" => [
                    'hint' => '+1 123 456 7890',
                ],
                'conditions' => "[contact_details]=='1'",
            ],

            'contact_email_address' => [
                'group' => 'contact_info',
                'type' => 'text',
                'label' => 'JGLOBAL_EMAIL',
                'description' => 'TPL_ASTROID_MISCELL_EMAIL_DESC',
                "attributes" => [
                    'hint' => 'email@yourcompany.com',
                ],
                'conditions' => "[contact_details]=='1'",
            ],

            'contact_open_hours' => [
                'group' => 'contact_info',
                'type' => 'text',
                'label' => 'TPL_ASTROID_MISCELL_OPEN_HOURS_LABEL',
                'description' => 'TPL_ASTROID_MISCELL_OPEN_HOURS_DESC',
                "attributes" => [
                    'hint' => 'Mon-Fri : 9:00am - 6:00pm',
                ],
                'conditions' => "[contact_details]=='1'",
            ],

            'contact_display' => [
                'group' => 'contact_info',
                'type' => 'radio',
                'label' => 'TPL_ASTROID_DISPLAY_LABEL',
                'description' => 'TPL_ASTROID_DISPLAY_LABEL_DESC',
                'default' => 'icons',
                'conditions' => "[contact_details]=='1'",
                'options' => [
                    'text' => 'TPL_ASTROID_TEXT',
                    'icons' => 'TPL_ASTROID_ICONS',
                ],
            ],

            'icon_color' => [
                'group' => 'contact_info',
                'type' => 'color',
                'label' => 'TPL_ASTROID_ICON_COLOR_LABEL',
                'description' => 'TPL_ASTROID_ICON_COLOR_DESC',
                'conditions' => "[contact_details]=='1' AND [contact_display]=='icons'",
            ],
        ]
    ]
);
<?php
use local_moon\library\Framework;
use local_moon\library\Helper\Constants;
use local_moon\library\Helper\Text;
Framework::getTheme()->addFields(
    'social_profile',
    [
        'label' => 'social_profiles',
        'icon' => 'as-icon as-icon-palette',
        'order' => 6,
        'fields' => [
            'social_profile' => ["type" => "group", "label" => "social_profiles", "description" => "social_profile_desc"],
            'enable_social_profiler' => [
                'group' => 'social_profile',
                'type' => 'radio',
                'label' => 'enable_social_profiles',
                'description' => 'enable_social_profiles_desc',
                'default' => '1',
                "attributes" => [
                    "role" => "switch"
                ]
            ],

            'social_profiles_position' => [
                'group' => 'social_profile',
                'type' => 'regions',
                'label' => 'TPL_ASTROID_MODULE_POSITION_LABEL',
                'description' => 'TPL_ASTROID_MODULE_POSITION_DESC',
                'attributes' => [
                    'astroid_content_layout' => 'social',
                ],
                'conditions' => "[enable_social_profiler]==true",
            ],

            'social_profiles_load_position' => [
                'group' => 'social_profile',
                'type' => 'list',
                'label' => 'TPL_ASTROID_FEATURE_LOAD_POSITION_LABEL',
                'description' => 'TPL_ASTROID_FEATURE_LOAD_POSITION_DESC',
                'default' => 'after',
                'attributes' => [
                    'astroid_content_layout_load' => 'social_profiles_position',
                ],
                'options' => [
                    'after' => 'TPL_ASTROID_AFTER_MODULE',
                    'before' => 'TPL_ASTROID_BEFORE_MODULE',
                ],
                'conditions' => "[enable_social_profiler]==true",
            ],

            'social_profiles_gutter' => [
                'group' => 'social_profile',
                'type' => 'list',
                'label' => 'TPL_ASTROID_SOCIAL_GUTTER',
                'description' => 'TPL_ASTROID_SOCIAL_GUTTER_DESC',
                'default' => '',
                'conditions' => "[enable_social_profiler]==true",
                'options' => [
                    ''  => 'Default',
                    '1' => 'X-Small',
                    '2' => 'Small',
                    '3' => 'Medium',
                    '4' => 'Large',
                    '5' => 'X-Large',
                ],
            ],

            'social_profiles_fontsize' => [
                'group' => 'social_profile',
                'type' => 'text',
                'label' => 'TPL_ASTROID_SOCIAL_FONTSIZE',
                'attributes' => [
                    'hint'  => '16px',
                ],
                'conditions' => "[enable_social_profiler]==true",
            ],

            'social_profiles_style' => [
                'group' => 'social_profile',
                'type' => 'list',
                'label' => 'TPL_ASTROID_SOCIAL_STYLE',
                'description' => 'TPL_ASTROID_SOCIAL_STYLE_DESC',
                'default' => '1',
                'options' => [
                    '1' => 'TPL_ASTROID_SOCIAL_STYLE_OPTIONS_INHERIT_COLOR',
                    '2' => 'TPL_ASTROID_SOCIAL_STYLE_OPTIONS_BRAND_COLOR',
                ],
                'conditions' => "[enable_social_profiler]==true",
            ],

            'social_icon_color' => [
                'group' => 'social_profile',
                'type' => 'color',
                'label' => 'TPL_ASTROID_SOCIAL_COLOR_LABEL',
                'description' => 'TPL_ASTROID_SOCIAL_COLOR_DESC',
                'conditions' => "[enable_social_profiler]==true AND [social_profiles_style]=='1'",
            ],

            'social_icon_color_hover' => [
                'group' => 'social_profile',
                'type' => 'color',
                'label' => 'TPL_ASTROID_SOCIAL_COLOR_HOVER_LABEL',
                'description' => 'TPL_ASTROID_SOCIAL_COLOR_HOVER_DESC',
                'conditions' => "[enable_social_profiler]==true AND [social_profiles_style]=='1'",
            ],

            'social_profiles' => [
                'group' => 'social_profile',
                'type' => 'socialprofiles',
                'conditions' => "[enable_social_profiler]==true",
                'attributes' => [
                    'options' =>  Constants::$social_profiles,
                    'lang'   => [
                        'social_brands'  => Text::_('TPL_ASTROID_SOCIAL_BRANDS'),
                        'social_search'  => Text::_('TPL_ASTROID_SOCIAL_SEARCH_LABEL'),
                        'add_profile'  => Text::_('TPL_ASTROID_ADD_PROFILE'),
                        'add_custom_social_label'  => Text::_('TPL_ASTROID_ADD_CUSTOM_SOCIAL_LABEL'),
                        'astroid_color'  => Text::_('TPL_ASTROID_COLOR'),
                        'astroid_icon'  => Text::_('TPL_ASTROID_ICON'),
                        'astroid_title'  => Text::_('TPL_ASTROID_TITLE'),
                        'astroid_icon_class'  => Text::_('TPL_ASTROID_ICON_CLASS'),
                        'astroid_link'  => Text::_('TPL_ASTROID_LINK'),
                        'astroid_mobile_number'  => Text::_('TPL_ASTROID_MOBILE_NUMBER'),
                        'astroid_skype_id'  => Text::_('TPL_ASTROID_SKYPE_ID'),
                        'astroid_username'  => Text::_('TPL_ASTROID_MOBILE_USERNAME'),
                        'astroid_social_link_placeholder'  => Text::_('TPL_ASTROID_SOCIAL_LINK_PLACEHOLDER'),
                        'astroid_social_whatsapp_placeholder'  => Text::_('TPL_ASTROID_SOCIAL_WHATSAPP_PLACEHOLDER'),
                        'astroid_social_telegram_placeholder'  => Text::_('TPL_ASTROID_SOCIAL_TELEGRAM_PLACEHOLDER'),
                        'astroid_social_skype_placeholder'  => Text::_('TPL_ASTROID_SOCIAL_SKYPE_PLACEHOLDER'),
                    ]
                ],
            ],
        ]
    ]
);
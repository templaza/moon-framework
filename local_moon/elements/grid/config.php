<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
use local_moon\library\Helper\Form;
use local_moon\library\Helper\Constants;
use local_moon\library\Helper\Font;
class MoonElementGrid extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'grid',
            'title' => 'Grid',
            'description' => 'Grid Widget of Moodle',
            'icon' => 'as-icon as-icon-profile',
            'category' => 'utility',
            'element_type' => 'widget'
        ]);
    }
    public function setFields(): void {
        $this->setFieldSet('general-settings');

        $this->addField('grid_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_GRID_OPTIONS_LABEL',
        ]);

        $this->addField('card_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_CARD_OPTIONS_LABEL',
        ]);

        $this->addField('icon_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_ICON_OPTIONS_LABEL',
        ]);

        $this->addField('image_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_IMAGE_OPTIONS_LABEL',
        ]);

        $this->addField('title_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_TITLE_OPTIONS_LABEL',
        ]);

        $this->addField('meta_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_META_OPTIONS_LABEL',
        ]);

        $this->addField('content_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_CONTENT_OPTIONS_LABEL',
        ]);

        $this->addField('readmore_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_READMORE_OPTIONS_LABEL',
        ]);
        $repeater_options = [
            'general-settings' => [
                'label' => 'general',
                'fields' => [
                    'type' => [
                        'type' => 'list',
                        'label' => 'ASTROID_WIDGET_MEDIA_TYPE',
                        'default' => '',
                        'options' => [
                            ''      => 'ASTROID_NONE',
                            'icon'  => 'TPL_ASTROID_BASIC_ICON_LABEL',
                            'image' => 'ASTROID_IMAGE',
                        ],
                    ],

                    'icon_type' => [
                        'conditions' => "[type]=='icon'",
                        'type' => 'list',
                        'label' => 'ASTROID_WIDGET_ICON_TYPE',
                        'default' => 'fontawesome',
                        'options' => [
                            'fontawesome' => 'TPL_ASTROID_FONTAWESOME',
                            'astroid'     => 'TPL_ASTROID_ASTROID_ICONS',
                            'custom'      => 'ASTROID_WIDGET_CUSTOM',
                        ],
                    ],

                    'fa_icon' => [
                        'conditions' => "[type]=='icon' AND [icon_type]=='fontawesome'",
                        'type' => 'icons',
                        "attributes" => [
                            'source' => 'fontawesome',
                        ],
                        'label' => 'ASTROID_WIDGET_ICON_LABEL',
                    ],

                    'as_icon' => [
                        'conditions' => "[type]=='icon' AND [icon_type]=='astroid'",
                        'type' => 'icons',
                        "attributes" => [
                            'source' => 'astroid',
                        ],
                        'label' => 'ASTROID_WIDGET_ICON_LABEL',
                    ],

                    'custom_icon' => [
                        'conditions' => "[type]=='icon' AND [icon_type]=='custom'",
                        'type' => 'text',
                        'label' => 'ASTROID_WIDGET_CUSTOM_ICON_CLASS',
                        'dynamic' => true,
                    ],

                    'image' => [
                        'conditions' => "[type]=='image'",
                        'type' => 'media',
                        'label' => 'TPL_ASTROID_SELECT_IMAGE',
                        'dynamic' => true,
                    ],

                    'title' => [
                        'type' => 'text',
                        'label' => 'JGLOBAL_TITLE',
                        'dynamic' => true,
                    ],

                    'meta' => [
                        'type' => 'text',
                        'label' => 'ASTROID_WIDGET_META',
                        'dynamic' => true,
                    ],

                    'description' => [
                        'type' => 'editor',
                        'label' => 'ASTROID_SHORTCUT_DESCRIPTION_LABEL',
                        'dynamic' => true,
                    ],

                    'link' => [
                        'type' => 'text',
                        'label' => 'ASTROID_WIDGET_LINK_LABEL',
                        'hint' => 'https://astroidframe.work',
                        'dynamic' => true,
                    ],

                    'link_title' => [
                        'conditions' => "[link]!=''",
                        'type' => 'text',
                        'label' => 'ASTROID_WIDGET_LINK_TEXT_LABEL',
                        'hint' => 'View More',
                        'dynamic' => true,
                    ],

                    'link_target' => [
                        'conditions' => "[link]!=''",
                        'type' => 'list',
                        'label' => 'ASTROID_WIDGET_LINK_TARGET_LABEL',
                        'default' => '',
                        'options' => [
                            ''         => 'Default',
                            '_blank'   => 'New Window',
                            '_parent'  => 'Parent Frame',
                            '_top'     => 'Full body of the window',
                        ],
                    ],

                    'enable_background_image' => [
                        'type' => 'radio',
                        "attributes" => [
                            "role" => "switch"
                        ],
                        'default' => '0',
                        'label' => 'ASTROID_WIDGET_ENABLE_BACKGROUND_IMAGE',
                    ],

                    'background_image' => [
                        'conditions' => "[enable_background_image]==1",
                        'type' => 'media',
                        'label' => 'TPL_ASTROID_BACKGROUND_IMAGE_LABEL',
                    ],

                    'background_repeat' => [
                        'conditions' => "[enable_background_image]==1",
                        'type' => 'list',
                        'label' => 'TPL_ASTROID_BACKGROUND_REPEAT_LABEL',
                        'options' => [
                            '' => 'JGLOBAL_INHERIT',
                            'no-repeat' => 'TPL_ASTROID_BACKGROUND_NO_REPEAT_LABEL',
                            'repeat-x'  => 'TPL_ASTROID_BACKGROUND_REPEAT_HORIZONTALLY_LABEL',
                            'repeat-y'  => 'TPL_ASTROID_BACKGROUND_REPEAT_VERTICAL_LABEL',
                        ],
                    ],

                    'background_size' => [
                        'conditions' => "[enable_background_image]==1",
                        'type' => 'list',
                        'label' => 'ASTROID_BACKGROUND_SIZE',
                        'options' => [
                            '' => 'JGLOBAL_INHERIT',
                            'cover' => 'ASTROID_BACKGROUND_SIZE_COVER',
                            'contain' => 'ASTROID_BACKGROUND_SIZE_CONTAIN',
                        ],
                    ],

                    'background_attchment' => [
                        'conditions' => "[enable_background_image]==1",
                        'type' => 'list',
                        'label' => 'ASTROID_BACKGROUND_ATTCHMENT',
                        'options' => [
                            '' => 'JGLOBAL_INHERIT',
                            'scroll' => 'ASTROID_BACKGROUND_ATTCHMENT_SCROLL',
                            'fixed'  => 'ASTROID_BACKGROUND_ATTCHMENT_FIXED',
                        ],
                    ],

                    'background_position' => [
                        'conditions' => "[enable_background_image]==1",
                        'type' => 'list',
                        'label' => 'ASTROID_BACKGROUND_POSITION_LABEL',
                        'options' => [
                            '' => 'JGLOBAL_INHERIT',
                            'left top'     => 'ASTROID_BACKGROUND_POSITION_LEFT_TOP',
                            'left center'  => 'ASTROID_BACKGROUND_POSITION_LEFT_CENTER',
                            'left bottom'  => 'ASTROID_BACKGROUND_POSITION_LEFT_BOTTOM',
                            'right top'    => 'ASTROID_BACKGROUND_POSITION_RIGHT_TOP',
                            'right center' => 'ASTROID_BACKGROUND_POSITION_RIGHT_CENTER',
                            'right bottom' => 'ASTROID_BACKGROUND_POSITION_RIGHT_BOTTOM',
                            'center top'   => 'ASTROID_BACKGROUND_POSITION_CENTER_TOP',
                            'center center'=> 'ASTROID_BACKGROUND_POSITION_CENTER_CENTER',
                            'center bottom'=> 'ASTROID_BACKGROUND_POSITION_CENTER_BOTTOM',
                        ],
                    ],
                ]
            ],
        ];
        $repeater   = new Form('subform', ['formsource' => $repeater_options, 'formtype' => 'string']);
        $this->addField('grids',  [
            "group" => "general",
            "type" => "subform",
            "label" => "ASTROID_WIDGET_GRIDS_LABEL",
            "attributes" => [
                'form'    =>  $repeater->renderJson('subform')
            ],
        ]);

        $this->addField('column_responsive', [
            "group"   => "grid_options",
            "type"    => "radio",
            "attributes" => [
                "width"   => "full",
            ],
            "default" => "lg",
            "options" => [
                "xxl" => "ASTROID_WIDGET_XXL_ICON",
                "xl"  => "ASTROID_WIDGET_XL_ICON",
                "lg"  => "ASTROID_WIDGET_LG_ICON",
                "md"  => "ASTROID_WIDGET_MD_ICON",
                "sm"  => "ASTROID_WIDGET_SM_ICON",
                "xs"  => "ASTROID_WIDGET_XS_ICON",
            ],
        ]);

        $this->addField('xxl_column', [
            "group"      => "grid_options",
            "type"       => "list",
            "name"       => "xxl_column",
            "label"      => "ASTROID_WIDGET_XXL_COLUMN",
            "default"    => "",
            "conditions" => "[column_responsive]=='xxl'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "1" => "ASTROID_WIDGET_1_COLUMN",
                "2" => "ASTROID_WIDGET_2_COLUMNS",
                "3" => "ASTROID_WIDGET_3_COLUMNS",
                "4" => "ASTROID_WIDGET_4_COLUMNS",
                "5" => "ASTROID_WIDGET_5_COLUMNS",
                "6" => "ASTROID_WIDGET_6_COLUMNS",
            ],
        ]);

        $this->addField('xl_column', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_XL_COLUMN",
            "default"    => "",
            "conditions" => "[column_responsive]=='xl'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "1" => "ASTROID_WIDGET_1_COLUMN",
                "2" => "ASTROID_WIDGET_2_COLUMNS",
                "3" => "ASTROID_WIDGET_3_COLUMNS",
                "4" => "ASTROID_WIDGET_4_COLUMNS",
                "5" => "ASTROID_WIDGET_5_COLUMNS",
                "6" => "ASTROID_WIDGET_6_COLUMNS",
            ],
        ]);

        $this->addField('lg_column', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_LG_COLUMN",
            "default"    => "3",
            "conditions" => "[column_responsive]=='lg'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "1" => "ASTROID_WIDGET_1_COLUMN",
                "2" => "ASTROID_WIDGET_2_COLUMNS",
                "3" => "ASTROID_WIDGET_3_COLUMNS",
                "4" => "ASTROID_WIDGET_4_COLUMNS",
                "5" => "ASTROID_WIDGET_5_COLUMNS",
                "6" => "ASTROID_WIDGET_6_COLUMNS",
            ],
        ]);

        $this->addField('md_column', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_MD_COLUMN",
            "default"    => "1",
            "conditions" => "[column_responsive]=='md'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "1" => "ASTROID_WIDGET_1_COLUMN",
                "2" => "ASTROID_WIDGET_2_COLUMNS",
                "3" => "ASTROID_WIDGET_3_COLUMNS",
                "4" => "ASTROID_WIDGET_4_COLUMNS",
                "5" => "ASTROID_WIDGET_5_COLUMNS",
                "6" => "ASTROID_WIDGET_6_COLUMNS",
            ],
        ]);

        $this->addField('sm_column', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_SM_COLUMN",
            "default"    => "1",
            "conditions" => "[column_responsive]=='sm'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "1" => "ASTROID_WIDGET_1_COLUMN",
                "2" => "ASTROID_WIDGET_2_COLUMNS",
                "3" => "ASTROID_WIDGET_3_COLUMNS",
                "4" => "ASTROID_WIDGET_4_COLUMNS",
                "5" => "ASTROID_WIDGET_5_COLUMNS",
                "6" => "ASTROID_WIDGET_6_COLUMNS",
            ],
        ]);

        $this->addField('xs_column', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_XS_COLUMN",
            "default"    => "1",
            "conditions" => "[column_responsive]=='xs'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "1" => "ASTROID_WIDGET_1_COLUMN",
                "2" => "ASTROID_WIDGET_2_COLUMNS",
                "3" => "ASTROID_WIDGET_3_COLUMNS",
                "4" => "ASTROID_WIDGET_4_COLUMNS",
                "5" => "ASTROID_WIDGET_5_COLUMNS",
                "6" => "ASTROID_WIDGET_6_COLUMNS",
            ],
        ]);

        $this->addField('row_gutter_xxl', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_ROW_GUTTER_XXL_LABEL",
            "default"    => "",
            "conditions" => "[column_responsive]=='xxl'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('row_gutter_xl', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_ROW_GUTTER_XL_LABEL",
            "default"    => "",
            "conditions" => "[column_responsive]=='xl'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('row_gutter_lg', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_ROW_GUTTER_LG_LABEL",
            "default"    => "4",
            "conditions" => "[column_responsive]=='lg'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('row_gutter_md', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_ROW_GUTTER_MD_LABEL",
            "default"    => "3",
            "conditions" => "[column_responsive]=='md'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('row_gutter_sm', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_ROW_GUTTER_SM_LABEL",
            "default"    => "3",
            "conditions" => "[column_responsive]=='sm'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('row_gutter', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_ROW_GUTTER_LABEL",
            "default"    => "3",
            "conditions" => "[column_responsive]=='xs'",
            "options"    => [
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('column_gutter_xxl', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_COLUMN_GUTTER_XXL_LABEL",
            "default"    => "",
            "conditions" => "[column_responsive]=='xxl'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('column_gutter_xl', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_COLUMN_GUTTER_XL_LABEL",
            "default"    => "",
            "conditions" => "[column_responsive]=='xl'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('column_gutter_lg', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_COLUMN_GUTTER_LG_LABEL",
            "default"    => "4",
            "conditions" => "[column_responsive]=='lg'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('column_gutter_md', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_COLUMN_GUTTER_MD_LABEL",
            "default"    => "3",
            "conditions" => "[column_responsive]=='md'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('column_gutter_sm', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_COLUMN_GUTTER_SM_LABEL",
            "default"    => "3",
            "conditions" => "[column_responsive]=='sm'",
            "options"    => [
                ""  => "JGLOBAL_INHERIT",
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('column_gutter', [
            "group"      => "grid_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_COLUMN_GUTTER_LABEL",
            "default"    => "3",
            "conditions" => "[column_responsive]=='xs'",
            "options"    => [
                "0" => "Collapse",
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('use_masonry', [
            "group"   => "grid_options",
            "type"    => "radio",
            "default" => "0",
            "attributes" => [
                "role" => "switch"
            ],
            "label"   => "ASTROID_USE_MASONRY",
        ]);

        $this->addField('card_style', [
            "group"   => "card_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_CARD_STYLE_LABEL",
            "default" => "",
            "options" => [
                ""          => "default",
                "primary"   => "Primary",
                "secondary" => "Secondary",
                "success"   => "Success",
                "danger"    => "Danger",
                "warning"   => "Warning",
                "info"      => "Info",
                "light"     => "Light",
                "dark"      => "Dark",
                "none"      => "None",
                "custom"    => "ASTROID_WIDGET_CUSTOM",
            ],
        ]);

        $this->addField('text_color', [
            "group"      => "card_options",
            "type"       => "color",
            "label"      => "TPL_ASTROID_TEXT_COLOR_LABEL",
            "conditions" => "[card_style]=='custom'",
        ]);

        $this->addField('bg_color', [
            "group"      => "card_options",
            "type"       => "color",
            "label"      => "TPL_ASTROID_BACKGROUND_COLOR_LABEL",
            "conditions" => "[card_style]=='custom'",
        ]);

        $this->addField('card_border', [
            "group"      => "card_options",
            "type"       => "border",
            "label"      => "ASTROID_WIDGET_BORDER_LABEL",
            "conditions" => "[card_style]=='custom'",
        ]);

        $this->addField('card_size', [
            "group"   => "card_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_CARD_SIZE_LABEL",
            "default" => "",
            "options" => [
                "none"   => "ASTROID_NONE",
                ""       => "TPL_ASTROID_DEFAULT",
                "small"  => "ASTROID_SMALL",
                "large"  => "ASTROID_LARGE",
                "custom" => "ASTROID_WIDGET_CUSTOM",
            ],
        ]);

        $this->addField('card_padding', [
            "group"      => "card_options",
            "type"       => "spacing",
            "label"      => "ASTROID_WIDGET_PADDING_LABEL",
            "conditions" => "[card_size]=='custom'",
        ]);

        $this->addField('card_border_radius', [
            "group"   => "card_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_CARD_BORDER_RADIUS_LABEL",
            "default" => "",
            "options" => [
                ""       => "TPL_ASTROID_ICON_STYLE_ROUNDED",
                "0"      => "TPL_ASTROID_ICON_STYLE_SQUARE",
                "circle" => "TPL_ASTROID_ICON_STYLE_CIRCLE",
                "pill"   => "TPL_ASTROID_ICON_STYLE_PILL",
            ],
        ]);

        $this->addField('card_rounded_size', [
            "group"      => "card_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_ROUNDED_SIZE_LABEL",
            "default"    => "3",
            "conditions" => "[card_border_radius]==''",
            "options"    => [
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('media_position', [
            "group"   => "card_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_MEDIA_POSITION_LABEL",
            "default" => "inside",
            "options" => [
                "top"    => "ASTROID_TOP",
                "left"   => "ASTROID_LEFT",
                "bottom" => "ASTROID_BOTTOM",
                "right"  => "ASTROID_RIGHT",
                "inside" => "ASTROID_INSIDE",
            ],
        ]);

        $this->addField('media_column_responsive', [
            "group"   => "card_options",
            "type"    => "radio",
            "attributes" => [
                "width"   => "full",
            ],
            "default" => "lg",
            "conditions" => "[media_position]=='left' OR [media_position]=='right'",
            "options" => [
                "xxl" => "ASTROID_WIDGET_XXL_ICON",
                "xl"  => "ASTROID_WIDGET_XL_ICON",
                "lg"  => "ASTROID_WIDGET_LG_ICON",
                "md"  => "ASTROID_WIDGET_MD_ICON",
                "sm"  => "ASTROID_WIDGET_SM_ICON",
                "xs"  => "ASTROID_WIDGET_XS_ICON",
            ],
        ]);

        // media columns (xxl/xl/lg/md/sm/xs) with conditions
        $this->addField('xxl_column_media', [
            "group"      => "card_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_XXL_COLUMN_IMAGE_WIDTH",
            "default"    => "",
            "conditions" => "[media_column_responsive]=='xxl' AND ([media_position]=='left' OR [media_position]=='right')",
            "options"    => [
                ""     => "JGLOBAL_INHERIT",
                "12"   => "1/1",
                "6"    => "1/2",
                "4"    => "1/3",
                "8"    => "2/3",
                "3"    => "1/4",
                "9"    => "3/4",
                "2"    => "1/6",
                "5"    => "5/12",
                "7"    => "7/12",
                "1"    => "1/12",
                "auto" => "auto",
            ],
        ]);

        $this->addField('xl_column_media', [
            "group"      => "card_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_XL_COLUMN_IMAGE_WIDTH",
            "default"    => "",
            "conditions" => "[media_column_responsive]=='xl' AND ([media_position]=='left' OR [media_position]=='right')",
            "options"    => [
                ""     => "JGLOBAL_INHERIT",
                "12"   => "1/1",
                "6"    => "1/2",
                "4"    => "1/3",
                "8"    => "2/3",
                "3"    => "1/4",
                "9"    => "3/4",
                "2"    => "1/6",
                "5"    => "5/12",
                "7"    => "7/12",
                "1"    => "1/12",
                "auto" => "auto",
            ],
        ]);

        $this->addField('lg_column_media', [
            "group"      => "card_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_LG_COLUMN_IMAGE_WIDTH",
            "default"    => "4",
            "conditions" => "[media_column_responsive]=='lg' AND ([media_position]=='left' OR [media_position]=='right')",
            "options"    => [
                ""     => "JGLOBAL_INHERIT",
                "12"   => "1/1",
                "6"    => "1/2",
                "4"    => "1/3",
                "8"    => "2/3",
                "3"    => "1/4",
                "9"    => "3/4",
                "2"    => "1/6",
                "5"    => "5/12",
                "7"    => "7/12",
                "1"    => "1/12",
                "auto" => "auto",
            ],
        ]);

        $this->addField('md_column_media', [
            "group"      => "card_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_MD_COLUMN_IMAGE_WIDTH",
            "default"    => "12",
            "conditions" => "[media_column_responsive]=='md' AND ([media_position]=='left' OR [media_position]=='right')",
            "options"    => [
                ""     => "JGLOBAL_INHERIT",
                "12"   => "1/1",
                "6"    => "1/2",
                "4"    => "1/3",
                "8"    => "2/3",
                "3"    => "1/4",
                "9"    => "3/4",
                "2"    => "1/6",
                "5"    => "5/12",
                "7"    => "7/12",
                "1"    => "1/12",
                "auto" => "auto",
            ],
        ]);

        $this->addField('sm_column_media', [
            "group"      => "card_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_SM_COLUMN_IMAGE_WIDTH",
            "default"    => "12",
            "conditions" => "[media_column_responsive]=='sm' AND ([media_position]=='left' OR [media_position]=='right')",
            "options"    => [
                ""     => "JGLOBAL_INHERIT",
                "12"   => "1/1",
                "6"    => "1/2",
                "4"    => "1/3",
                "8"    => "2/3",
                "3"    => "1/4",
                "9"    => "3/4",
                "2"    => "1/6",
                "5"    => "5/12",
                "7"    => "7/12",
                "1"    => "1/12",
                "auto" => "auto",
            ],
        ]);

        $this->addField('xs_column_media', [
            "group"      => "card_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_XS_COLUMN_IMAGE_WIDTH",
            "default"    => "12",
            "conditions" => "[media_column_responsive]=='xs' AND ([media_position]=='left' OR [media_position]=='right')",
            "options"    => [
                ""     => "JGLOBAL_INHERIT",
                "12"   => "1/1",
                "6"    => "1/2",
                "4"    => "1/3",
                "8"    => "2/3",
                "3"    => "1/4",
                "9"    => "3/4",
                "2"    => "1/6",
                "5"    => "5/12",
                "7"    => "7/12",
                "1"    => "1/12",
                "auto" => "auto",
            ],
        ]);

        $this->addField('vertical_middle', [
            "group"      => "card_options",
            "type"       => "radio",
            "default"    => "0",
            "attributes" => [
                "role" => "switch"
            ],
            "label"      => "ASTROID_WIDGET_VERTICAL_MIDDLE",
            "conditions" => "[media_position]=='left' OR [media_position]=='right'",
        ]);

        $this->addField('enable_grid_match', [
            "group"   => "card_options",
            "type"    => "radio",
            "default" => "0",
            "attributes" => [
                "role" => "switch"
            ],
            "label"   => "ASTROID_WIDGET_ENABLE_GRID_MATCH",
        ]);

        $this->addField('card_hover_transition', [
            "group"   => "card_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_HOVER_TRANSITION_LABEL",
            "default" => "",
            "options" => Constants::$hover_transition,
        ]);

        $this->addField('card_box_shadow', [
            "group"   => "card_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_BOX_SHADOW_LABEL",
            "default" => "",
            "options" => [
                ""             => "TPL_ASTROID_DEFAULT",
                "shadow-none"  => "ASTROID_WIDGET_SHADOW_NONE",
                "shadow-sm"    => "ASTROID_WIDGET_SHADOW_SMALL",
                "shadow"       => "ASTROID_WIDGET_SHADOW_REGULAR",
                "shadow-lg"    => "ASTROID_WIDGET_SHADOW_LARGE",
            ],
        ]);

        $this->addField('card_box_shadow_hover', [
            "group"   => "card_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_BOX_SHADOW_HOVER_LABEL",
            "default" => "",
            "options" => [
                ""                    => "TPL_ASTROID_DEFAULT",
                "shadow-hover-none"   => "ASTROID_WIDGET_SHADOW_NONE",
                "shadow-hover-sm"     => "ASTROID_WIDGET_SHADOW_SMALL",
                "shadow-hover"        => "ASTROID_WIDGET_SHADOW_REGULAR",
                "shadow-hover-lg"     => "ASTROID_WIDGET_SHADOW_LARGE",
                "shadow-hover-popout" => "ASTROID_WIDGET_SHADOW_POPUP",
            ],
        ]);

        $this->addField('icon_size', [
            "group"   => "icon_options",
            "type"    => "range",
            "label"   => "TPL_ASTROID_BASIC_ICON_SIZE_LABEL",
            "attributes" => [
                "min"     => 1,
                "max"     => 300,
                "step"    => 1,
                "postfix"    => "px",
            ],
            "default" => 60,
        ]);

        $this->addField('icon_color', [
            "group" => "icon_options",
            "type"  => "color",
            "label" => "TPL_ASTROID_COLOR",
        ]);

        $this->addField('icon_color_hover', [
            "group" => "icon_options",
            "type"  => "color",
            "label" => "TPL_ASTROID_COLOR_HOVER",
        ]);

        $this->addField('enable_icon_link', [
            "group"   => "icon_options",
            "type"    => "radio",
            "default" => "0",
            "attributes" => [
                "role" => "switch"
            ],
            "label"   => "ASTROID_WIDGET_ENABLE_ICON_LINK",
        ]);

        $this->addField('layout', [
            "group"   => "image_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_CHOOSE_LAYOUT_LABEL",
            "default" => "classic",
            "options" => [
                "classic" => "ASTROID_WIDGET_LAYOUT_CLASSIC_LABEL",
                "overlay" => "ASTROID_WIDGET_LAYOUT_IMG_OVERLAY_LABEL",
            ],
        ]);

        $this->addField('image_fullwidth', [
            "group"   => "image_options",
            "type"    => "radio",
            "default" => "1",
            "attributes" => [
                "role" => "switch"
            ],
            "label"   => "ASTROID_WIDGET_IMAGE_FULLWIDTH",
        ]);

        $this->addField('enable_image_cover', [
            "group"   => "image_options",
            "type"    => "radio",
            "default" => "0",
            "attributes" => [
                "role" => "switch"
            ],
            "label"   => "ASTROID_WIDGET_ENABLE_IMAGE_COVER",
        ]);

        $this->addField('min_height', [
            "group"      => "image_options",
            "type"       => "range",
            "label"      => "ASTROID_WIDGET_MIN_HEIGHT",
            "attributes" => [
                "min"        => 1,
                "max"        => 600,
                "step"       => 1,
                "postfix"    => "px",
            ],
            "default"    => 200,
            "conditions" => "[enable_image_cover]==1",
        ]);

        $this->addField('overlay_type', [
            "group"      => "image_options",
            "type"       => "radio",
            "attributes" => [
                "width"   => "full",
            ],
            "default"    => "color",
            "label"      => "ASTROID_WIDGET_OVERLAY_COLOR",
            "conditions" => "[enable_image_cover]==1",
            "options"    => [
                ""         => "ASTROID_NONE",
                "color"    => "TPL_ASTROID_COLOR",
                "gradient" => "ASTROID_WIDGET_OVERLAY_GRADIENT",
            ],
        ]);

        $this->addField('overlay_color', [
            "group"      => "image_options",
            "type"       => "color",
            "label"      => "ASTROID_WIDGET_OVERLAY_COLOR",
            "conditions" => "[enable_image_cover]==1 AND [overlay_type]=='color'",
        ]);

        $this->addField('overlay_gradient', [
            "group"      => "image_options",
            "type"       => "gradient",
            "label"      => "ASTROID_WIDGET_OVERLAY_GRADIENT",
            "conditions" => "[enable_image_cover]==1 AND [overlay_type]=='gradient'",
        ]);

        $this->addField('image_border_radius', [
            "group"   => "image_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_BORDER_RADIUS_LABEL",
            "default" => "0",
            "options" => [
                "rounded" => "TPL_ASTROID_ICON_STYLE_ROUNDED",
                "0"       => "TPL_ASTROID_ICON_STYLE_SQUARE",
                "circle"  => "TPL_ASTROID_ICON_STYLE_CIRCLE",
                "pill"    => "TPL_ASTROID_ICON_STYLE_PILL",
            ],
        ]);

        $this->addField('image_rounded_size', [
            "group"      => "image_options",
            "type"       => "list",
            "label"      => "ASTROID_WIDGET_ROUNDED_SIZE_LABEL",
            "default"    => "3",
            "conditions" => "[image_border_radius]=='rounded'",
            "options"    => [
                "1" => "X-Small",
                "2" => "Small",
                "3" => "Medium",
                "4" => "Large",
                "5" => "X-Large",
            ],
        ]);

        $this->addField('hover_effect', [
            "group"   => "image_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_HOVER_EFFECT_LABEL",
            "default" => "",
            "options" => [
                ""        => "TPL_ASTROID_DEFAULT",
                "light-up" => "ASTROID_WIDGET_EFFECT_LIGHT_UP",
                "flash"    => "ASTROID_WIDGET_EFFECT_FLASH",
                "unveil"   => "ASTROID_WIDGET_EFFECT_UNVEIL",
            ],
        ]);

        $this->addField('hover_transition', [
            "group"   => "image_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_HOVER_TRANSITION_LABEL",
            "default" => "",
            "options" => Constants::$hover_transition,
        ]);

        $this->addField('title_html_element', [
            "group"   => "title_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_HTML_ELEMENT_LABEL",
            "default" => "h3",
            "options" => [
                "h1" => "h1",
                "h2" => "h2",
                "h3" => "h3",
                "h4" => "h4",
                "h5" => "h5",
                "h6" => "h6",
                "div" => "div",
            ],
        ]);

        $this->addField('title_font_style', [
            "group"   => "title_options",
            "type"    => "typography",
            "label"   => "ASTROID_WIDGET_FONT_STYLES_LABEL",
            "attributes" => [
                'options' => [
                    "colorpicker" => false,
                    'stylepicker' => false,
                    'fontpicker' => true,
                    'sizepicker' => true,
                    'letterspacingpicker' => true,
                    'lineheightpicker' => true,
                    'weightpicker' => true,
                    'transformpicker' => true,
                    'columns' => 1,
                    'preview' => false,
                    'collapse' => false,
                    'system_fonts' => Font::get_system_fonts(),
                    'text_transform_options' => Font::text_transform(),
                    'lang' => Font::font_properties(),
                ],
                'lang' => Font::font_properties(),
                'value' => Font::$get_default_font_value,
            ],
        ]);

        $this->addField('title_heading_margin', [
            "group" => "title_options",
            "type"  => "spacing",
            "label" => "ASTROID_WIDGET_MARGIN_LABEL",
        ]);

        $this->addField('meta_font_style', [
            "group"   => "meta_options",
            "type"    => "typography",
            "label"   => "ASTROID_WIDGET_FONT_STYLES_LABEL",
            "attributes" => [
                'options' => [
                    "colorpicker" => false,
                    'stylepicker' => false,
                    'fontpicker' => true,
                    'sizepicker' => true,
                    'letterspacingpicker' => true,
                    'lineheightpicker' => true,
                    'weightpicker' => true,
                    'transformpicker' => true,
                    'columns' => 1,
                    'preview' => false,
                    'collapse' => false,
                    'system_fonts' => Font::get_system_fonts(),
                    'text_transform_options' => Font::text_transform(),
                    'lang' => Font::font_properties(),
                ],
                'lang' => Font::font_properties(),
                'value' => Font::$get_default_font_value,
            ],
        ]);

        $this->addField('meta_heading_margin', [
            "group" => "meta_options",
            "type"  => "spacing",
            "label" => "ASTROID_WIDGET_MARGIN_LABEL",
        ]);

        $this->addField('meta_position', [
            "group"   => "meta_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_META_POSITION_LABEL",
            "default" => "before",
            "options" => [
                "before" => "ASTROID_BEFORE_TITLE",
                "after"  => "ASTROID_AFTER_TITLE",
            ],
        ]);

        $this->addField('content_font_style', [
            "group"   => "content_options",
            "type"    => "typography",
            "label"   => "ASTROID_WIDGET_FONT_STYLES_LABEL",
            "attributes" => [
                'options' => [
                    "colorpicker" => false,
                    'stylepicker' => false,
                    'fontpicker' => true,
                    'sizepicker' => true,
                    'letterspacingpicker' => true,
                    'lineheightpicker' => true,
                    'weightpicker' => true,
                    'transformpicker' => true,
                    'columns' => 1,
                    'preview' => false,
                    'collapse' => false,
                    'system_fonts' => Font::get_system_fonts(),
                    'text_transform_options' => Font::text_transform(),
                    'lang' => Font::font_properties(),
                ],
                'lang' => Font::font_properties(),
                'value' => Font::$get_default_font_value,
            ],
        ]);

        $this->addField('button_style', [
            "group"   => "readmore_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_GLOBAL_STYLES_LABEL",
            "name"    => "button_style",
            "default" => "primary",
            "options" => [
                "primary"   => "Primary",
                "secondary" => "Secondary",
                "success"   => "Success",
                "danger"    => "Danger",
                "warning"   => "Warning",
                "info"      => "Info",
                "light"     => "Light",
                "dark"      => "Dark",
                "link"      => "Link",
                "text"      => "Text",
            ],
        ]);

        $this->addField('button_outline', [
            "group"   => "readmore_options",
            "type"    => "radio",
            "default" => "0",
            "attributes" => [
                "role" => "switch"
            ],
            "label"   => "ASTROID_WIDGET_BUTTON_OUTLINE_LABEL",
        ]);

        $this->addField('button_size', [
            "group"   => "readmore_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_BUTTON_SIZE_LABEL",
            "default" => "",
            "options" => [
                ""       => "Default",
                "btn-lg" => "Large",
                "btn-sm" => "Small",
            ],
        ]);

        $this->addField('btn_border_radius', [
            "group"   => "readmore_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_GLOBAL_BORDER_RADIUS_LABEL",
            "default" => "",
            "options" => [
                ""             => "Rounded",
                "rounded-0"    => "Square",
                "rounded-pill" => "Circle",
            ],
        ]);

        $this->addField('button_margin_top', [
            "group"   => "readmore_options",
            "type"    => "list",
            "label"   => "ASTROID_WIDGET_BUTTON_MARGIN_TOP",
            "default" => "",
            "options" => [
                ""  => "JNONE",
                "1" => "J1",
                "2" => "J2",
                "3" => "J3",
                "4" => "J4",
                "5" => "J5",
            ],
        ]);
    }
}
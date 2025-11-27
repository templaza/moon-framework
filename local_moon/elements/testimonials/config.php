<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
use local_moon\library\Helper\Form;
use local_moon\library\Helper\Constants;
use local_moon\library\Helper\Font;
class MoonElementTestimonials extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'testimonials',
            'title' => 'Testimonials',
            'description' => 'Testimonials Widget of Moodle',
            'icon' => 'as-icon as-icon-quote-close',
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

        $this->addField('slider_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_SLIDER_OPTIONS_LABEL',
        ]);

        $this->addField('avatar_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_TESTIMONIALS_AVATAR_POSITION_LABEL',
        ]);

        $this->addField('name_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_NAME_OPTIONS_LABEL',
        ]);

        $this->addField('designation_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_TESTIMONIALS_DESIGNATION_POSITION_LABEL',
        ]);

        $this->addField('content_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_MESSAGE_OPTIONS_LABEL',
        ]);

        $this->addField('rating_options', [
            'type'  => 'group',
            'label' => 'ASTROID_WIDGET_RATING_OPTIONS_LABEL',
        ]);
        $repeater_options = [
            'general-settings' => [
                'label' => 'general',
                'fields' => [
                    'title' => [
                        'type'    => 'text',
                        'name'    => 'title',
                        'label'   => 'ASTROID_WIDGET_NAME_LABEL',
                        'dynamic' => true,
                    ],

                    'designation' => [
                        'type'    => 'text',
                        'name'    => 'designation',
                        'label'   => 'ASTROID_WIDGET_TESTIMONIALS_DESIGNATION_LABEL',
                        'dynamic' => true,
                    ],

                    'link' => [
                        'type'    => 'text',
                        'name'    => 'link',
                        'label'   => 'ASTROID_WIDGET_LINK_LABEL',
                        'hint'    => 'https://astroidframe.work',
                        'dynamic' => true,
                    ],

                    'link_title' => [
                        'type'       => 'text',
                        'name'       => 'link_title',
                        'label'      => 'ASTROID_WIDGET_LINK_TEXT_LABEL',
                        'hint'       => 'astroidframe.work',
                        'dynamic'    => true,
                        'conditions' => "[link]!=''",
                    ],

                    'avatar' => [
                        'type'    => 'media',
                        'name'    => 'avatar',
                        'label'   => 'ASTROID_WIDGET_AVATAR_LABEL',
                        'dynamic' => true,
                    ],

                    'message' => [
                        'type'    => 'editor',
                        'name'    => 'message',
                        'label'   => 'ASTROID_WIDGET_MESSAGE_LABEL',
                        'dynamic' => true,
                    ],

                    'rating' => [
                        'type'       => 'range',
                        'name'       => 'rating',
                        'label'      => 'ASTROID_RATING',
                        'attributes' => [
                            'min'     => 0,
                            'max'     => 5,
                            'step'    => 0.5,
                            'postfix' => 'stars',
                        ],
                        'default' => 5,
                        'dynamic' => true,
                    ],
                ]
            ],
        ];
        $repeater   = new Form('subform', ['formsource' => $repeater_options, 'formtype' => 'string']);
        $this->addField('testimonials',  [
            "group" => "general",
            "type" => "subform",
            "label" => "testimonials",
            "attributes" => [
                'form'    =>  $repeater->renderJson('subform')
            ],
        ]);
        $this->addField('overlay_text_color', [
            'group'   => 'general',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_OVERLAY_TEXT_COLOR',
            'default' => '',
            'options' => [
                ''         => 'JGLOBAL_INHERIT',
                'as-light' => 'ASTROID_WIDGET_LIGHT_COLOR',
                'as-dark'  => 'ASTROID_WIDGET_DARK_COLOR',
            ],
        ]);

        $this->addField('column_responsive', [
            'group'   => 'grid_options',
            'type'    => 'radio',
            'width'   => 'full',
            'default' => 'lg',
            'options' => [
                'xxl' => 'ASTROID_WIDGET_XXL_ICON',
                'xl'  => 'ASTROID_WIDGET_XL_ICON',
                'lg'  => 'ASTROID_WIDGET_LG_ICON',
                'md'  => 'ASTROID_WIDGET_MD_ICON',
                'sm'  => 'ASTROID_WIDGET_SM_ICON',
                'xs'  => 'ASTROID_WIDGET_XS_ICON',
            ],
        ]);

        $this->addField('xxl_column', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_XXL_COLUMN',
            'default'    => '',
            'conditions' => "[column_responsive]=='xxl'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '1' => 'ASTROID_WIDGET_1_COLUMN',
                '2' => 'ASTROID_WIDGET_2_COLUMNS',
                '3' => 'ASTROID_WIDGET_3_COLUMNS',
                '4' => 'ASTROID_WIDGET_4_COLUMNS',
                '5' => 'ASTROID_WIDGET_5_COLUMNS',
                '6' => 'ASTROID_WIDGET_6_COLUMNS',
            ],
        ]);

        $this->addField('xl_column', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_XL_COLUMN',
            'default'    => '',
            'conditions' => "[column_responsive]=='xl'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '1' => 'ASTROID_WIDGET_1_COLUMN',
                '2' => 'ASTROID_WIDGET_2_COLUMNS',
                '3' => 'ASTROID_WIDGET_3_COLUMNS',
                '4' => 'ASTROID_WIDGET_4_COLUMNS',
                '5' => 'ASTROID_WIDGET_5_COLUMNS',
                '6' => 'ASTROID_WIDGET_6_COLUMNS',
            ],
        ]);

        $this->addField('lg_column', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_LG_COLUMN',
            'default'    => '1',
            'conditions' => "[column_responsive]=='lg'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '1' => 'ASTROID_WIDGET_1_COLUMN',
                '2' => 'ASTROID_WIDGET_2_COLUMNS',
                '3' => 'ASTROID_WIDGET_3_COLUMNS',
                '4' => 'ASTROID_WIDGET_4_COLUMNS',
                '5' => 'ASTROID_WIDGET_5_COLUMNS',
                '6' => 'ASTROID_WIDGET_6_COLUMNS',
            ],
        ]);

        $this->addField('md_column', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_MD_COLUMN',
            'default'    => '1',
            'conditions' => "[column_responsive]=='md'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '1' => 'ASTROID_WIDGET_1_COLUMN',
                '2' => 'ASTROID_WIDGET_2_COLUMNS',
                '3' => 'ASTROID_WIDGET_3_COLUMNS',
                '4' => 'ASTROID_WIDGET_4_COLUMNS',
                '5' => 'ASTROID_WIDGET_5_COLUMNS',
                '6' => 'ASTROID_WIDGET_6_COLUMNS',
            ],
        ]);

        $this->addField('sm_column', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_SM_COLUMN',
            'default'    => '1',
            'conditions' => "[column_responsive]=='sm'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '1' => 'ASTROID_WIDGET_1_COLUMN',
                '2' => 'ASTROID_WIDGET_2_COLUMNS',
                '3' => 'ASTROID_WIDGET_3_COLUMNS',
                '4' => 'ASTROID_WIDGET_4_COLUMNS',
                '5' => 'ASTROID_WIDGET_5_COLUMNS',
                '6' => 'ASTROID_WIDGET_6_COLUMNS',
            ],
        ]);

        $this->addField('xs_column', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_XS_COLUMN',
            'default'    => '1',
            'conditions' => "[column_responsive]=='xs'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '1' => 'ASTROID_WIDGET_1_COLUMN',
                '2' => 'ASTROID_WIDGET_2_COLUMNS',
                '3' => 'ASTROID_WIDGET_3_COLUMNS',
                '4' => 'ASTROID_WIDGET_4_COLUMNS',
                '5' => 'ASTROID_WIDGET_5_COLUMNS',
                '6' => 'ASTROID_WIDGET_6_COLUMNS',
            ],
        ]);

        $this->addField('row_gutter_xxl', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_ROW_GUTTER_XXL_LABEL',
            'default'    => '',
            'conditions' => "[column_responsive]=='xxl'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('row_gutter_xl', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_ROW_GUTTER_XL_LABEL',
            'default'    => '',
            'conditions' => "[column_responsive]=='xl'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('row_gutter_lg', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_ROW_GUTTER_LG_LABEL',
            'default'    => '4',
            'conditions' => "[column_responsive]=='lg'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('row_gutter_md', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_ROW_GUTTER_MD_LABEL',
            'default'    => '3',
            'conditions' => "[column_responsive]=='md'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('row_gutter_sm', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_ROW_GUTTER_SM_LABEL',
            'default'    => '3',
            'conditions' => "[column_responsive]=='sm'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('row_gutter', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_ROW_GUTTER_LABEL',
            'default'    => '3',
            'conditions' => "[column_responsive]=='xs'",
            'options'    => [
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('column_gutter_xxl', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_COLUMN_GUTTER_XXL_LABEL',
            'default'    => '',
            'conditions' => "[column_responsive]=='xxl'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('column_gutter_xl', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_COLUMN_GUTTER_XL_LABEL',
            'default'    => '',
            'conditions' => "[column_responsive]=='xl'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('column_gutter_lg', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_COLUMN_GUTTER_LG_LABEL',
            'default'    => '4',
            'conditions' => "[column_responsive]=='lg'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('column_gutter_md', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_COLUMN_GUTTER_MD_LABEL',
            'default'    => '3',
            'conditions' => "[column_responsive]=='md'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('column_gutter_sm', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_COLUMN_GUTTER_SM_LABEL',
            'default'    => '3',
            'conditions' => "[column_responsive]=='sm'",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('column_gutter', [
            'group'      => 'grid_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_COLUMN_GUTTER_LABEL',
            'default'    => '3',
            'conditions' => "[column_responsive]=='xs'",
            'options'    => [
                '0' => 'Collapse',
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('use_masonry', [
            'group'      => 'grid_options',
            'type'       => 'radio',
            'default'    => '0',
            'label'      => 'ASTROID_USE_MASONRY',
            'attributes' => ["role" => "switch"],
        ]);

        $this->addField('card_style', [
            'group'   => 'card_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_CARD_STYLE_LABEL',
            'default' => '',
            'options' => [
                ''          => 'Default',
                'primary'   => 'Primary',
                'secondary' => 'Secondary',
                'success'   => 'Success',
                'danger'    => 'Danger',
                'warning'   => 'Warning',
                'info'      => 'Info',
                'light'     => 'Light',
                'dark'      => 'Dark',
                'none'      => 'None',
            ],
        ]);

        $this->addField('card_size', [
            'group'   => 'card_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_CARD_SIZE_LABEL',
            'default' => '',
            'options' => [
                'none'   => 'ASTROID_NONE',
                ''       => 'TPL_ASTROID_DEFAULT',
                'small'  => 'ASTROID_SMALL',
                'large'  => 'ASTROID_LARGE',
                'custom' => 'ASTROID_WIDGET_CUSTOM',
            ],
        ]);

        $this->addField('card_padding', [
            'group'      => 'card_options',
            'type'       => 'spacing',
            'label'      => 'ASTROID_WIDGET_PADDING_LABEL',
            'conditions' => "[card_size]=='custom'",
        ]);

        $this->addField('card_border_radius', [
            'group'   => 'card_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_CARD_BORDER_RADIUS_LABEL',
            'default' => '',
            'options' => [
                ''       => 'TPL_ASTROID_ICON_STYLE_ROUNDED',
                '0'      => 'TPL_ASTROID_ICON_STYLE_SQUARE',
                'circle' => 'TPL_ASTROID_ICON_STYLE_CIRCLE',
                'pill'   => 'TPL_ASTROID_ICON_STYLE_PILL',
            ],
        ]);

        $this->addField('card_rounded_size', [
            'group'      => 'card_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_ROUNDED_SIZE_LABEL',
            'default'    => '3',
            'conditions' => "[card_border_radius]==''",
            'options'    => [
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('avatar_column_responsive', [
            'group'      => 'card_options',
            'type'       => 'radio',
            'width'      => 'full',
            'default'    => 'lg',
            'conditions' => "[avatar_position]=='left' OR [avatar_position]=='right'",
            'options'    => [
                'xxl' => 'ASTROID_WIDGET_XXL_ICON',
                'xl'  => 'ASTROID_WIDGET_XL_ICON',
                'lg'  => 'ASTROID_WIDGET_LG_ICON',
                'md'  => 'ASTROID_WIDGET_MD_ICON',
                'sm'  => 'ASTROID_WIDGET_SM_ICON',
                'xs'  => 'ASTROID_WIDGET_XS_ICON',
            ],
        ]);

        $this->addField('xxl_column_avatar', [
            'group'      => 'card_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_XXL_COLUMN_AVATAR_WIDTH',
            'default'    => '',
            'conditions' => "[avatar_column_responsive]=='xxl' AND ([avatar_position]=='left' OR [avatar_position]=='right')",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '12' => '1/1',
                '6'  => '1/2',
                '4'  => '1/3',
                '8'  => '2/3',
                '3'  => '1/4',
                '9'  => '3/4',
                '2'  => '1/6',
                '5'  => '5/12',
                '7'  => '7/12',
            ],
        ]);

        $this->addField('xl_column_avatar', [
            'group'      => 'card_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_XL_COLUMN_AVATAR_WIDTH',
            'default'    => '',
            'conditions' => "[avatar_column_responsive]=='xl' AND ([avatar_position]=='left' OR [avatar_position]=='right')",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '12' => '1/1',
                '6'  => '1/2',
                '4'  => '1/3',
                '8'  => '2/3',
                '3'  => '1/4',
                '9'  => '3/4',
                '2'  => '1/6',
                '5'  => '5/12',
                '7'  => '7/12',
            ],
        ]);

        $this->addField('lg_column_avatar', [
            'group'      => 'card_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_LG_COLUMN_AVATAR_WIDTH',
            'default'    => '4',
            'conditions' => "[avatar_column_responsive]=='lg' AND ([avatar_position]=='left' OR [avatar_position]=='right')",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '12' => '1/1',
                '6'  => '1/2',
                '4'  => '1/3',
                '8'  => '2/3',
                '3'  => '1/4',
                '9'  => '3/4',
                '2'  => '1/6',
                '5'  => '5/12',
                '7'  => '7/12',
            ],
        ]);

        $this->addField('md_column_avatar', [
            'group'      => 'card_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_MD_COLUMN_AVATAR_WIDTH',
            'default'    => '12',
            'conditions' => "[avatar_column_responsive]=='md' AND ([avatar_position]=='left' OR [avatar_position]=='right')",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '12' => '1/1',
                '6'  => '1/2',
                '4'  => '1/3',
                '8'  => '2/3',
                '3'  => '1/4',
                '9'  => '3/4',
                '2'  => '1/6',
                '5'  => '5/12',
                '7'  => '7/12',
            ],
        ]);

        $this->addField('sm_column_avatar', [
            'group'      => 'card_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_SM_COLUMN_AVATAR_WIDTH',
            'default'    => '12',
            'conditions' => "[avatar_column_responsive]=='sm' AND ([avatar_position]=='left' OR [avatar_position]=='right')",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '12' => '1/1',
                '6'  => '1/2',
                '4'  => '1/3',
                '8'  => '2/3',
                '3'  => '1/4',
                '9'  => '3/4',
                '2'  => '1/6',
                '5'  => '5/12',
                '7'  => '7/12',
            ],
        ]);

        $this->addField('xs_column_avatar', [
            'group'      => 'card_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_XS_COLUMN_AVATAR_WIDTH',
            'default'    => '12',
            'conditions' => "[avatar_column_responsive]=='xs' AND ([avatar_position]=='left' OR [avatar_position]=='right')",
            'options'    => [
                ''  => 'JGLOBAL_INHERIT',
                '12' => '1/1',
                '6'  => '1/2',
                '4'  => '1/3',
                '8'  => '2/3',
                '3'  => '1/4',
                '9'  => '3/4',
                '2'  => '1/6',
                '5'  => '5/12',
                '7'  => '7/12',
            ],
        ]);

        $this->addField('enable_grid_match', [
            'group'      => 'card_options',
            'type'       => 'radio',
            'default'    => '0',
            'label'      => 'ASTROID_WIDGET_ENABLE_GRID_MATCH',
            'attributes' => ["role" => "switch"],
        ]);

        $this->addField('card_hover_transition', [
            'group'   => 'card_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_HOVER_TRANSITION_LABEL',
            'default' => '',
            'options' => Constants::$hover_transition,
        ]);

        $this->addField('card_box_shadow', [
            'group'   => 'card_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_BOX_SHADOW_LABEL',
            'default' => '',
            'options' => [
                ''            => 'TPL_ASTROID_DEFAULT',
                'shadow-none' => 'ASTROID_WIDGET_SHADOW_NONE',
                'shadow-sm'   => 'ASTROID_WIDGET_SHADOW_SMALL',
                'shadow'      => 'ASTROID_WIDGET_SHADOW_REGULAR',
                'shadow-lg'   => 'ASTROID_WIDGET_SHADOW_LARGE',
            ],
        ]);

        $this->addField('card_box_shadow_hover', [
            'group'   => 'card_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_BOX_SHADOW_HOVER_LABEL',
            'default' => '',
            'options' => [
                ''                 => 'TPL_ASTROID_DEFAULT',
                'shadow-hover-none' => 'ASTROID_WIDGET_SHADOW_NONE',
                'shadow-hover-sm'   => 'ASTROID_WIDGET_SHADOW_SMALL',
                'shadow-hover'      => 'ASTROID_WIDGET_SHADOW_REGULAR',
                'shadow-hover-lg'   => 'ASTROID_WIDGET_SHADOW_LARGE',
            ],
        ]);

        $this->addField('enable_slider', [
            'group'      => 'slider_options',
            'type'       => 'radio',
            'default'    => '0',
            'label'      => 'ASTROID_WIDGET_ARTICLES_ENABLE_SLIDER',
            'attributes' => ["role" => "switch"],
        ]);

        $this->addField('slider_autoplay', [
            'group'      => 'slider_options',
            'type'       => 'radio',
            'default'    => '0',
            'label'      => 'ASTROID_WIDGET_AUTOPLAY',
            'conditions' => "[enable_slider]==1",
            'attributes' => ["role" => "switch"],
        ]);

        $this->addField('interval', [
            'group'      => 'slider_options',
            'type'       => 'range',
            'label'      => 'ASTROID_WIDGET_INTERVAL',
            'default'    => '3',
            'conditions' => "[enable_slider]==1 AND [slider_autoplay]==1",
            'attributes' => ['min' => 1, 'max' => 10, 'step' => 1, 'postfix' => 'seconds'],
        ]);

        $this->addField('slider_nav', [
            'group'      => 'slider_options',
            'type'       => 'radio',
            'default'    => '1',
            'label'      => 'ASTROID_WIDGET_NAVIGATION',
            'conditions' => "[enable_slider]==1",
            'attributes' => ["role" => "switch"],
        ]);

        $this->addField('nav_position', [
            'group'      => 'slider_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_NAV_POSITION',
            'default'    => '',
            'conditions' => "[enable_slider]==1 AND [slider_nav]==1",
            'options'    => [
                ''          => 'ASTROID_WIDGET_NAV_POSITION_INSIDE',
                'nav-outside' => 'ASTROID_WIDGET_NAV_POSITION_OUTSIDE',
            ],
        ]);

        $this->addField('slider_dotnav', [
            'group'      => 'slider_options',
            'type'       => 'radio',
            'default'    => '0',
            'label'      => 'ASTROID_WIDGET_DOT_NAVIGATION',
            'conditions' => "[enable_slider]==1",
            'attributes' => ["role" => "switch"],
        ]);

        $this->addField('dot_alignment', [
            'group'      => 'slider_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_DOT_ALIGNMENT',
            'default'    => '',
            'conditions' => "[enable_slider]==1 AND [slider_dotnav]==1",
            'options'    => [
                ''       => 'JGLOBAL_INHERIT',
                'left'   => 'JGLOBAL_LEFT',
                'center' => 'JGLOBAL_CENTER',
                'right'  => 'JGLOBAL_RIGHT',
            ],
        ]);

        $this->addField('avatar_position', [
            'group'   => 'avatar_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_TESTIMONIALS_AVATAR_POSITION_LABEL',
            'default' => 'top',
            'options' => [
                'top'    => 'ASTROID_TOP',
                'left'   => 'ASTROID_LEFT',
                'bottom' => 'ASTROID_BOTTOM',
                'right'  => 'ASTROID_RIGHT',
            ],
        ]);

        $this->addField('image_max_width', [
            'group'      => 'avatar_options',
            'type'       => 'range',
            'label'      => 'ASTROID_WIDGET_MAX_WIDTH_LABEL',
            'default'    => '200',
            'attributes' => ['min' => 1, 'max' => 1200, 'step' => 1, 'postfix' => 'px'],
        ]);

        $this->addField('image_border', [
            'group' => 'avatar_options',
            'type'  => 'border',
            'label' => 'ASTROID_WIDGET_BORDER_LABEL',
        ]);

        $this->addField('image_border_radius', [
            'group'   => 'avatar_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_BORDER_RADIUS_LABEL',
            'default' => '0',
            'options' => [
                'rounded' => 'TPL_ASTROID_ICON_STYLE_ROUNDED',
                '0'       => 'TPL_ASTROID_ICON_STYLE_SQUARE',
                'circle'  => 'TPL_ASTROID_ICON_STYLE_CIRCLE',
                'pill'    => 'TPL_ASTROID_ICON_STYLE_PILL',
            ],
        ]);

        $this->addField('image_rounded_size', [
            'group'      => 'avatar_options',
            'type'       => 'list',
            'label'      => 'ASTROID_WIDGET_ROUNDED_SIZE_LABEL',
            'default'    => '3',
            'conditions' => "[image_border_radius]=='rounded'",
            'options'    => [
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('hover_effect', [
            'group'   => 'avatar_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_HOVER_EFFECT_LABEL',
            'default' => '',
            'options' => [
                ''        => 'TPL_ASTROID_DEFAULT',
                'light-up'=> 'ASTROID_WIDGET_EFFECT_LIGHT_UP',
                'flash'   => 'ASTROID_WIDGET_EFFECT_FLASH',
                'unveil'  => 'ASTROID_WIDGET_EFFECT_UNVEIL',
            ],
        ]);

        $this->addField('hover_transition', [
            'group'   => 'avatar_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_HOVER_TRANSITION_LABEL',
            'default' => '',
            'options' => Constants::$hover_transition,
        ]);

        $this->addField('title_html_element', [
            'group'   => 'name_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_HTML_ELEMENT_LABEL',
            'default' => 'h3',
            'options' => [
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
                'div'=> 'div',
            ],
        ]);

        $this->addField('title_font_style', [
            'group' => 'name_options',
            'type'  => 'typography',
            'label' => 'ASTROID_WIDGET_FONT_STYLES_LABEL',
            'columns' => 1,
            'preview' => false,
        ]);

        $this->addField('title_heading_margin', [
            'group' => 'name_options',
            'type'  => 'spacing',
            'label' => 'ASTROID_WIDGET_MARGIN_LABEL',
        ]);

        $this->addField('designation_font_style', [
            'group'   => 'designation_options',
            'type'    => 'typography',
            'label'   => 'ASTROID_WIDGET_FONT_STYLES_LABEL',
            'columns' => 1,
            'preview' => false,
        ]);

        $this->addField('designation_heading_margin', [
            'group' => 'designation_options',
            'type'  => 'spacing',
            'label' => 'ASTROID_WIDGET_MARGIN_LABEL',
        ]);

        $this->addField('designation_position', [
            'group'   => 'designation_options',
            'type'    => 'list',
            'label'   => 'ASTROID_WIDGET_META_POSITION_LABEL',
            'default' => 'after',
            'options' => [
                'before' => 'ASTROID_BEFORE_TITLE',
                'after'  => 'ASTROID_AFTER_TITLE',
            ],
        ]);

        $this->addField('content_font_style', [
            'group'   => 'content_options',
            'type'    => 'typography',
            'label'   => 'ASTROID_WIDGET_FONT_STYLES_LABEL',
            'columns' => 1,
            'preview' => false,
        ]);

        $this->addField('content_margin', [
            'group' => 'content_options',
            'type'  => 'spacing',
            'label' => 'ASTROID_WIDGET_MARGIN_LABEL',
        ]);

        $this->addField('enable_rating', [
            'group'      => 'rating_options',
            'type'       => 'radio',
            'default'    => '0',
            'label'      => 'ASTROID_WIDGET_ENABLE_RATING',
            'attributes' => ["role" => "switch"],
        ]);

        $this->addField('rating_color', [
            'group' => 'rating_options',
            'type'  => 'color',
            'label' => 'ASTROID_WIDGET_RATING_COLOR',
        ]);
    }
}
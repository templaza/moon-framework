<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
use local_moon\library\Helper\Form;
use local_moon\library\Helper\Constants;
use local_moon\library\Helper\Font;
class MoonElementArt_Slider extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'art_slider',
            'title' => 'Art Slider',
            'description' => 'Art Slider Widget of Moodle',
            'icon' => 'as-icon as-icon-spotlights',
            'category' => 'utility,media',
            'element_type' => 'widget'
        ]);
    }
    public function setFields(): void {
        $this->setFieldSet('general-settings');

        $this->addField('slideshow_options', [
            'type'  => 'group',
            'label' => 'slideshow',
        ]);

        $this->addField('overlay_options', [
            'type'  => 'group',
            'label' => 'overlay',
        ]);

        $this->addField('title_options', [
            'type'  => 'group',
            'label' => 'title',
        ]);

        $this->addField('meta_options', [
            'type'  => 'group',
            'label' => 'meta',
        ]);

        $this->addField('content_options', [
            'type'  => 'group',
            'label' => 'content',
        ]);

        $this->addField('readmore_options', [
            'type'  => 'group',
            'label' => 'readmore',
        ]);
        $repeater_options = [
            'general-settings' => [
                'label' => 'general',
                'fields' => [
                    'image' => [
                        'type'    => 'media',
                        'label'   => 'TPL_ASTROID_SELECT_IMAGE',
                        'dynamic' => true,
                    ],
                    'title' => [
                        'type'    => 'text',
                        'label'   => 'JGLOBAL_TITLE',
                        'dynamic' => true,
                    ],
                    'meta' => [
                        'type'    => 'text',
                        'label'   => 'ASTROID_WIDGET_META',
                        'dynamic' => true,
                    ],
                    'description' => [
                        'type'    => 'editor',
                        'label'   => 'ASTROID_SHORTCUT_DESCRIPTION_LABEL',
                        'dynamic' => true,
                    ],
                    'link' => [
                        'type'    => 'text',
                        'label'   => 'ASTROID_WIDGET_LINK_LABEL',
                        "attributes" => [
                            'hint'    => 'https://moonframe.work',
                            'dynamic' => true,
                        ],
                    ],
                    'link_title' => [
                        'type'       => 'text',
                        'label'      => 'ASTROID_WIDGET_LINK_TEXT_LABEL',
                        "attributes" => [
                            'hint'       => 'View More',
                            'dynamic' => true,
                        ],
                        'conditions' => "[link]!==''",
                    ],
                    'link_target' => [
                        'type'       => 'list',
                        'label'      => 'ASTROID_WIDGET_LINK_TARGET_LABEL',
                        'default'    => '',
                        'conditions' => "[link]!==''",
                        'options'    => [
                            ''       => 'Default',
                            '_blank' => 'New Window',
                            '_parent'=> 'Parent Frame',
                            '_top'   => 'Full body of the window',
                        ],
                    ],
                ]
            ],
        ];
        $repeater   = new Form('subform', ['formsource' => $repeater_options, 'formtype' => 'string']);
        $this->addField('slides',  [
            "group" => "general",
            "type" => "subform",
            "label" => "slides",
            "attributes" => [
                'form'    =>  $repeater->renderJson('subform')
            ],
        ]);

        $this->addField('slider_height', [
            'group'      => 'slideshow_options',
            'type'       => 'range',
            "attributes" => [
                'min'        => 1,
                'max'        => 1200,
                'step'       => 1,
                'label'      => 'ASTROID_WIDGET_HEIGHT_LABEL',
                'responsive' => true,
                'postfix'    => 'vh|px',
            ],
            'default'    => 80,
        ]);

        $this->addField('min_height', [
            'group'   => 'slideshow_options',
            'type'    => 'range',
            "attributes" => [
                'min'        => 1,
                'max'        => 1200,
                'step'       => 1,
                'label'      => 'ASTROID_WIDGET_MIN_HEIGHT',
                'responsive' => true,
                'postfix' => 'px',
            ],
            'default' => 600,
        ]);

        $this->addField('effect_type', [
            'group'   => 'slideshow_options',
            'type'    => 'list',
            'name'    => 'effect_type',
            'label'   => 'ASTROID_WIDGET_EFFECT_TYPE',
            'default' => 'theater',
            'options' => [
                'theater'               => 'Theater',
                'drape'                 => 'Drape',
                'slide_vertical'        => 'Vertical Slider',
                'slide_horizontal'      => 'Horizontal Slider',
                'simple_slide_vertical' => 'Vertical Slider Simple',
                'slide_cross'           => 'Cross Slider',
                'fashion'               => 'Fashion',
                'shutters'              => 'Shutters Slider',
                'shutters_vertical'     => 'Vertical Shutters Slider',
                'expo'                  => 'Expo Slider',
                'gallery'               => 'Gallery',
                'tv_channel'            => 'TV Channel',
                'flip'                  => 'Flip Slider',
                'stone_throwing'        => 'Stone Throwing',
                'spring'                => 'Spring Slider',
                'page_flip'             => 'Page Flip',
            ],
        ]);

        $this->addField('main_color', [
            'group' => 'slideshow_options',
            'type'  => 'color',
            'label' => 'ASTROID_WIDGET_MAIN_COLOR',
        ]);

        $this->addField('autoplay', [
            'group'   => 'slideshow_options',
            'type'    => 'radio',
            "attributes" => [
                "role" => "switch"
            ],
            'default' => '0',
            'label'   => 'ASTROID_WIDGET_AUTOPLAY',
        ]);

        $this->addField('interval', [
            'group'      => 'slideshow_options',
            'type'       => 'range',
            "attributes" => [
                'min'        => 1,
                'max'        => 10,
                'step'       => 1,
                'label'      => 'ASTROID_WIDGET_INTERVAL',
                'postfix'    => 'seconds',
            ],
            'default'    => 3,
            'conditions' => "[autoplay]==1",
        ]);

        $this->addField('controls', [
            'group'   => 'slideshow_options',
            'type'    => 'radio',
            "attributes" => [
                "role" => "switch"
            ],
            'default' => '1',
            'label'   => 'ASTROID_WIDGET_CONTROLS',
        ]);

        $this->addField('indicators', [
            'group'   => 'slideshow_options',
            'type'    => 'radio',
            "attributes" => [
                "role" => "switch"
            ],
            'default' => '1',
            'label'   => 'ASTROID_WIDGET_INDICATORS',
        ]);

        $this->addField('image_effect', [
            'group'   => 'slideshow_options',
            'type'    => 'list',
            'name'    => 'image_effect',
            'label'   => 'ASTROID_WIDGET_IMAGE_EFFECT',
            'default' => '',
            'options' => [
                ''           => 'JNONE',
                'zoom_image' => 'TPL_ASTROID_ZOOM_IN',
            ],
        ]);

        $this->addField('slide_border_radius', [
            'group'   => 'slideshow_options',
            'type'    => 'list',
            'name'    => 'slide_border_radius',
            'label'   => 'ASTROID_WIDGET_BORDER_RADIUS_LABEL',
            'default' => '',
            'options' => [
                ''       => 'TPL_ASTROID_ICON_STYLE_ROUNDED',
                '0'      => 'TPL_ASTROID_ICON_STYLE_SQUARE',
                'circle' => 'TPL_ASTROID_ICON_STYLE_CIRCLE',
                'pill'   => 'TPL_ASTROID_ICON_STYLE_PILL',
            ],
        ]);

        $this->addField('slide_rounded_size', [
            'group'      => 'slideshow_options',
            'type'       => 'list',
            'name'       => 'slide_rounded_size',
            'label'      => 'ASTROID_WIDGET_ROUNDED_SIZE_LABEL',
            'default'    => '3',
            'conditions' => "[slide_border_radius]==''",
            'options'    => [
                '1' => 'X-Small',
                '2' => 'Small',
                '3' => 'Medium',
                '4' => 'Large',
                '5' => 'X-Large',
            ],
        ]);

        $this->addField('box_shadow', [
            'group'   => 'slideshow_options',
            'type'    => 'list',
            'name'    => 'box_shadow',
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

        $this->addField('box_shadow_hover', [
            'group'   => 'slideshow_options',
            'type'    => 'list',
            'name'    => 'box_shadow_hover',
            'label'   => 'ASTROID_WIDGET_BOX_SHADOW_HOVER_LABEL',
            'default' => '',
            'options' => [
                ''                   => 'TPL_ASTROID_DEFAULT',
                'shadow-hover-none'  => 'ASTROID_WIDGET_SHADOW_NONE',
                'shadow-hover-sm'    => 'ASTROID_WIDGET_SHADOW_SMALL',
                'shadow-hover'       => 'ASTROID_WIDGET_SHADOW_REGULAR',
                'shadow-hover-lg'    => 'ASTROID_WIDGET_SHADOW_LARGE',
            ],
        ]);

        $this->addField('overlay_max_width', [
            'group'       => 'overlay_options',
            'type'        => 'list',
            'name'        => 'overlay_max_width',
            'label'       => 'ASTROID_WIDGET_MAX_WIDTH_LABEL',
            'description' => 'ASTROID_WIDGET_MAX_WIDTH_DESC',
            'default'     => '',
            'options'     => [
                ''        => 'JGLOBAL_INHERIT',
                'xxsmall' => 'ASTROID_XXS',
                'xsmall'  => 'ASTROID_XS',
                'small'   => 'ASTROID_SM',
                'medium'  => 'ASTROID_MD',
                'large'   => 'ASTROID_LG',
                'xlarge'  => 'ASTROID_XL',
                'xxlarge' => 'ASTROID_XXL',
            ],
        ]);

        $this->addField('overlay_position', [
            'group'   => 'overlay_options',
            'type'    => 'list',
            'name'    => 'overlay_position',
            'label'   => 'ASTROID_WIDGET_OVERLAY_POSITION_LABEL',
            'default' => 'justify-content-center align-items-center',
            'options' => [
                'justify-content-start align-items-start'   => 'ASTROID_WIDGET_TOP_LEFT',
                'justify-content-center align-items-start'  => 'ASTROID_WIDGET_TOP_CENTER',
                'justify-content-end align-items-start'     => 'ASTROID_WIDGET_TOP_RIGHT',
                'justify-content-start align-items-center'  => 'ASTROID_WIDGET_CENTER_LEFT',
                'justify-content-center align-items-center' => 'ASTROID_WIDGET_CENTER_CENTER',
                'justify-content-end align-items-center'    => 'ASTROID_WIDGET_CENTER_RIGHT',
                'justify-content-start align-items-end'     => 'ASTROID_WIDGET_BOTTOM_LEFT',
                'justify-content-center align-items-end'    => 'ASTROID_WIDGET_BOTTOM_CENTER',
                'justify-content-end align-items-end'       => 'ASTROID_WIDGET_BOTTOM_RIGHT',
            ],
        ]);

        $this->addField('overlay_text_color', [
            'group'   => 'overlay_options',
            'type'    => 'list',
            'name'    => 'overlay_text_color',
            'label'   => 'ASTROID_WIDGET_OVERLAY_TEXT_COLOR',
            'default' => '',
            'options' => [
                ''         => 'JGLOBAL_INHERIT',
                'as-light' => 'ASTROID_WIDGET_LIGHT_COLOR',
                'as-dark'  => 'ASTROID_WIDGET_DARK_COLOR',
            ],
        ]);

        $this->addField('overlay_type', [
            'group'   => 'overlay_options',
            'type'    => 'radio',
            "attributes" => [
                'width'   => 'full',
            ],
            'name'    => 'overlay_type',
            'default' => 'color',
            'options' => [
                ''                 => 'ASTROID_NONE',
                'color'            => 'TPL_ASTROID_COLOR',
                'background-color' => 'TPL_ASTROID_GRADIENT',
            ],
        ]);

        $this->addField('overlay_color', [
            'group'      => 'overlay_options',
            'type'       => 'color',
            'name'       => 'overlay_color',
            'label'      => 'ASTROID_WIDGET_OVERLAY_COLOR',
            'conditions' => "[overlay_type]=='color'",
        ]);

        $this->addField('overlay_gradient', [
            'group'      => 'overlay_options',
            'type'       => 'gradient',
            'name'       => 'overlay_gradient',
            'label'      => 'ASTROID_WIDGET_OVERLAY_GRADIENT',
            'conditions' => "[overlay_type]=='background-color'",
        ]);

        $this->addField('overlay_padding', [
            'group'   => 'overlay_options',
            'type'    => 'list',
            'name'    => 'overlay_padding',
            'label'   => 'ASTROID_WIDGET_OVERLAY_PADDING_LABEL',
            'default' => '',
            'options' => [
                'none'   => 'ASTROID_NONE',
                ''       => 'TPL_ASTROID_DEFAULT',
                'small'  => 'ASTROID_SMALL',
                'large'  => 'ASTROID_LARGE',
                'custom' => 'ASTROID_WIDGET_CUSTOM',
            ],
        ]);

        $this->addField('overlay_custom_padding', [
            'group'      => 'overlay_options',
            'type'       => 'spacing',
            'name'       => 'overlay_custom_padding',
            'label'      => 'ASTROID_WIDGET_PADDING_LABEL',
            'conditions' => "[overlay_padding]=='custom'",
        ]);

        $this->addField('title_html_element', [
            'group'   => 'title_options',
            'type'    => 'list',
            'name'    => 'title_html_element',
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
            'group'   => 'title_options',
            'type'    => 'typography',
            'name'    => 'title_font_style',
            'label'   => 'ASTROID_WIDGET_FONT_STYLES_LABEL',
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
            'group' => 'title_options',
            'type'  => 'spacing',
            'name'  => 'title_heading_margin',
            'label' => 'ASTROID_WIDGET_MARGIN_LABEL',
        ]);

        $this->addField('meta_font_style', [
            'group'   => 'meta_options',
            'type'    => 'typography',
            'name'    => 'meta_font_style',
            'label'   => 'ASTROID_WIDGET_FONT_STYLES_LABEL',
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
            'group' => 'meta_options',
            'type'  => 'spacing',
            'name'  => 'meta_heading_margin',
            'label' => 'ASTROID_WIDGET_MARGIN_LABEL',
        ]);

        $this->addField('meta_position', [
            'group'   => 'meta_options',
            'type'    => 'list',
            'name'    => 'meta_position',
            'label'   => 'ASTROID_WIDGET_META_POSITION_LABEL',
            'default' => 'before',
            'options' => [
                'before' => 'ASTROID_BEFORE_TITLE',
                'after'  => 'ASTROID_AFTER_TITLE',
            ],
        ]);

        $this->addField('content_font_style', [
            'group'   => 'content_options',
            'type'    => 'typography',
            'name'    => 'content_font_style',
            'label'   => 'ASTROID_WIDGET_FONT_STYLES_LABEL',
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
            'group'   => 'readmore_options',
            'type'    => 'list',
            'name'    => 'button_style',
            'label'   => 'ASTROID_WIDGET_GLOBAL_STYLES_LABEL',
            'default' => 'primary',
            'options' => [
                'primary'   => 'Primary',
                'secondary' => 'Secondary',
                'success'   => 'Success',
                'danger'    => 'Danger',
                'warning'   => 'Warning',
                'info'      => 'Info',
                'light'     => 'Light',
                'dark'      => 'Dark',
                'link'      => 'Link',
            ],
        ]);

        $this->addField('button_outline', [
            'group'   => 'readmore_options',
            'type'    => 'radio',
            'name'    => 'button_outline',
            "attributes" => [
                "role" => "switch"
            ],
            'default' => '0',
            'label'   => 'ASTROID_WIDGET_BUTTON_OUTLINE_LABEL',
        ]);

        $this->addField('button_size', [
            'group'   => 'readmore_options',
            'type'    => 'list',
            'name'    => 'button_size',
            'label'   => 'ASTROID_WIDGET_GLOBAL_STYLES_LABEL',
            'default' => '',
            'options' => [
                ''       => 'Default',
                'btn-lg' => 'Large',
                'btn-sm' => 'Small',
            ],
        ]);

        $this->addField('btn_border_radius', [
            'group'   => 'readmore_options',
            'type'    => 'list',
            'name'    => 'btn_border_radius',
            'label'   => 'ASTROID_WIDGET_GLOBAL_BORDER_RADIUS_LABEL',
            'default' => '',
            'options' => [
                ''             => 'Rounded',
                'rounded-0'    => 'Square',
                'rounded-pill' => 'Circle',
            ],
        ]);
    }
}
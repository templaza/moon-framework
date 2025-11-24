<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
use local_moon\library\Helper\Form;
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
            'title' => 'ASTROID_WIDGET_GRID_OPTIONS_LABEL',
        ]);

        $this->addField('card_options', [
            'type'  => 'group',
            'title' => 'ASTROID_WIDGET_CARD_OPTIONS_LABEL',
        ]);

        $this->addField('icon_options', [
            'type'  => 'group',
            'title' => 'ASTROID_WIDGET_ICON_OPTIONS_LABEL',
        ]);

        $this->addField('image_options', [
            'type'  => 'group',
            'title' => 'ASTROID_WIDGET_IMAGE_OPTIONS_LABEL',
        ]);

        $this->addField('title_options', [
            'type'  => 'group',
            'title' => 'ASTROID_WIDGET_TITLE_OPTIONS_LABEL',
        ]);

        $this->addField('meta_options', [
            'type'  => 'group',
            'title' => 'ASTROID_WIDGET_META_OPTIONS_LABEL',
        ]);

        $this->addField('content_options', [
            'type'  => 'group',
            'title' => 'ASTROID_WIDGET_CONTENT_OPTIONS_LABEL',
        ]);

        $this->addField('readmore_options', [
            'type'  => 'group',
            'title' => 'ASTROID_WIDGET_READMORE_OPTIONS_LABEL',
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
                        'label' => 'ASTROID_WIDGET_ICON_LABEL',
                    ],

                    'as_icon' => [
                        'conditions' => "[type]=='icon' AND [icon_type]=='astroid'",
                        'type' => 'icons',
                        'source' => 'astroid',
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
    }
}
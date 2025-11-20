<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementCourse_Content_Footer extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'course_content_footer',
            'title' => 'Course Content Footer',
            'description' => 'Footer Section of Course Content',
            'icon' => 'fa-solid fa-puzzle-piece',
            'category' => 'system',
            'element_type' => 'system',
            'multiple' => false,
        ]);
    }
}
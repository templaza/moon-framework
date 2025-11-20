<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\MoonElement;
class MoonElementCourse_Content_Header extends MoonElement {
    public function __construct()
    {
        parent::__construct([
            'name' => 'course_content_header',
            'title' => 'Course Content Header',
            'description' => 'Header Section of Course Content',
            'icon' => 'fa-solid fa-puzzle-piece',
            'category' => 'system',
            'element_type' => 'system',
            'multiple' => false,
        ]);
    }
}
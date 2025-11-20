<?php
/**
 * @package   Moon Framework
 * @author    Moon Framework Team https://moonframe.work
 * @copyright Copyright (C) 2025 MoonFrame.work.
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 or Later
 */
namespace local_moon\library\Helper;
defined('MOODLE_INTERNAL') || die;

use local_moon\library\Framework;
class Header {
    public string $mode = '';
    public function __construct($mode = 'horizontal') {
        $this->mode = $mode;
    }
    public function getOptions(): array
    {
        if (!method_exists($this, $this->mode)) return self::horizontal();
        return self::{$this->mode}();
    }
    public static function horizontal(): array
    {
        $template = Framework::getTheme();
        $params = $template->getParams();
        $mode = $params->get('header_horizontal_menu_mode', 'left');
        $header_breakpoint = $params->get('header_breakpoint', 'lg');
        $class = ['astroid-header', 'astroid-horizontal-header', 'astroid-horizontal-' . $mode . '-header'];
        $navClass = ['nav', 'astroid-nav', 'd-none', 'd-'.$header_breakpoint.'-flex'];
        $navWrapperClass = ['align-self-center', 'd-none', 'd-'.$header_breakpoint.'-block'];
        $headAttrs = ' data-megamenu data-megamenu-class=".has-megamenu" data-megamenu-content-class=".megamenu-container" data-dropdown-arrow="'.($params->get('dropdown_arrow', 0) ? 'true' : 'false').'" data-header-offset="true" data-transition-speed="'.$params->get('dropdown_animation_speed', 300).'" data-megamenu-animation="'.$params->get('dropdown_animation_type', 'fade').'" data-easing="'.$params->get('dropdown_animation_ease', 'linear').'" data-astroid-trigger="'.$params->get('dropdown_trigger', 'hover').'" data-megamenu-submenu-class=".nav-submenu,.nav-submenu-static"';
        $burgerClass = ['containerClass' => 'd-flex d-'.$header_breakpoint.'-none justify-content-start'];
        return [
            'class' => implode(' ', $class),
            'navClass' => implode(' ', $navClass),
            'navWrapperClass' => implode(' ', $navWrapperClass),
            'headAttrs' => $headAttrs,
            'burgerClass' => implode(' ', $burgerClass),
            'header_breakpoint' => $header_breakpoint,
            'is_left' => $mode === 'left',
            'is_right' => $mode === 'right',
            'is_center' => $mode === 'center',
        ];
    }
}
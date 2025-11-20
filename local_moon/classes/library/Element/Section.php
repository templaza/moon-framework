<?php
/**
 * @package   Moon Framework
 * @author    Moon Framework Team https://moonframe.work
 * @copyright Copyright (C) 2025 MoonFrame.work.
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 or Later
 */
namespace local_moon\library\Element;

use local_moon\library\Framework;

defined('MOODLE_INTERNAL') || die;

class Section extends BaseElement
{
    public $hasComponent = false;
    public $hasHeader = false;
    public $hasFooter = false;

    public function render()
    {
        $content = '';
        foreach ($this->_data['rows'] as $row) {
            $row = new Row($row, $this, $this->role);
            $content .= $row->render();
        }
        $container = $this->_container();
        if (!empty($content) && !empty($container)) {
            $this->content .= '<div class="' . $container . '">';
        }
        $this->content .= $content;
        if (!empty($content) && !empty($container)) {
            $this->content .= '</div>';
        }
        return $this->wrap();
    }

    protected function _container()
    {
        $container = $this->params->get('layout_type', '');
        $custom_class = $this->params->get('custom_container_class', '');
        switch ($container) {
            case '':
                if ($this->isRoot) {
                    $container = 'container';
                } else {
                    $container = '';
                }
                break;
            case 'no-container':
                $container = '';
                break;
            case 'container-with-no-gutters':
                $container = 'container';
                break;
            case 'container-fluid-with-no-gutters':
                $container = 'container-fluid';
                break;
        }
        if (!empty($container) && !empty($custom_class)) {
            $container .= ' ' . $custom_class;
        }
        return $container;
    }
}

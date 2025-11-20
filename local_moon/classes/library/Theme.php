<?php
/**
 * @package   Moon Framework
 * @author    Moon Framework Team https://moonframe.work
 * @copyright Copyright (C) 2025 MoonFrame.work.
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 or Later
 */
namespace local_moon\library;
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Element\Layout;
use local_moon\library\Helper\Path;
use local_moon\library\Helper\Registry;
use local_moon\library\Helper\Utilities;
use theme_config;
class Theme {
    public string $name = 'moon';
    public object $theme;
    protected array $fields = [];
    protected object|null $params = null;
    protected array|null $config = null;
    public function __construct($theme = null) {
        global $PAGE;
        if (!defined('CLI_SCRIPT')) {
            // Nếu $PAGE tồn tại nhưng chưa có context, đặt fallback là system context
            if (isset($PAGE) && empty($PAGE->context)) {
                $PAGE->set_context(\context_system::instance());
            }
        }
        if (empty($theme) && isset($PAGE) && $PAGE->theme) {
            $this->theme = $PAGE->theme;
            $this->name  = $PAGE->theme->name;
        } else {
            $themename = $theme ?? get_config('core', 'theme');
            $this->theme = theme_config::load($themename);
            $this->name  = $this->theme->name;
        }
        $this->config = $this->getThemeConfigs();
        $this->params = new Registry($this->theme->settings);
    }
    public function getName() : string
    {
        return 'theme_' . $this->name;
    }
    public function getThemeConfigs() : array|null
    {
        if ($this->config) return $this->config;
        $this->config = Utilities::getThemeConfigs($this->name);
        return $this->config;
    }
    public function getParams()
    {
        return $this->params;
    }
    public function isMoon() : bool
    {
        return is_array($this->config) && isset($this->config['framework']) && $this->config['framework'] == 'moon';
    }
    public function addFields($fieldset, $setting): void
    {
        if (!isset($this->fields[$fieldset])) {
            $this->fields[$fieldset] = $setting;
        } else {
            $this->fields[$fieldset] = array_merge($this->fields[$fieldset], $setting);
        }
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function loadSettings(): void
    {
        foreach ($this->fields as $key => $fieldset) {
            foreach ($fieldset['fields'] as $fieldname => $value) {
                if ($value['type'] == 'group') {
                    continue;
                }
                $this->fields[$key]['fields'][$fieldname]['value'] = $this->params->get($fieldname, $this->fields[$key]['fields'][$fieldname]['default'] ?? '');
            }
        }
    }

    public function getLayouts(): array
    {
        return Layout::getDatalayouts(Framework::getTheme()->getName(), 'main_layouts');
    }

    public function getLayout($layout = '') : array|false
    {
        global $PAGE;
        return empty($layout) ? (Layout::getDataLayout($PAGE->pagelayout, 'main_layouts') ?: false) : (Layout::getDataLayout($layout, 'main_layouts') ?: false);
    }

    public function registerLayout(string $name, array $data): void {
        if (empty($name) || empty($data['file'])) {
            debugging("registerLayout(): Missing layout name or file.", DEBUG_DEVELOPER);
            return;
        }

        // Chuẩn hóa thông tin
        $layout = [
            'file' => $data['file'],
            'regions' => $data['regions'] ?? ['side-pre', 'side-post'],
            'defaultregion' => $data['defaultregion'] ?? 'side-pre',
        ];

        // Gộp thêm options phụ
        if (!empty($data['options'])) {
            $layout = array_merge($layout, $data['options']);
        }
        // Ghi vào theme layouts
        $this->theme->layouts[$name] = $layout;
    }

    public function getElementLayout($type) : string
    {
        global $CFG;
        $template_path = $CFG->dirroot . "/theme/{$this->name}/elements";
        if (file_exists(Path::clean($template_path . '/' . $type . '/render.php'))) {
            return Path::clean($template_path . '/' . $type . '/render.php');
        }
        $local_path = $CFG->dirroot . '/local/moon/elements';
        if (file_exists(Path::clean($local_path . '/' . $type . '/render.php'))) {
            return Path::clean($local_path . '/' . $type . '/render.php');
        }
        debugging("getElementLayout(): Element layout not found for type: {$type}", DEBUG_DEVELOPER);
        return '';
    }
    public function getColorMode() :string {
        $colorMode = $this->params->get('astroid_color_mode_enable', 0);
        if ($colorMode == 2) {
            return 'dark';
        }

        $colorModeDefault = $this->params->get('astroid_color_mode_default', 'auto');

        if ($colorMode == 1) {
            if ($this->params->get('enable_color_mode_transform', 0)) {
                return $this->params->get('colormode_transform_type', 'light_dark') === 'light_dark' ? 'light' : 'dark';
            }
            $clientColor = optional_param('color_mode', '', PARAM_ALPHAEXT);
            return !empty($clientColor)
                ? $clientColor
                : ($_COOKIE['moon-color-mode-' . md5($this->name)] ?? $colorModeDefault);
        }

        return 'light';
    }
    public function getRegions() : array
    {
        return $this->config['regions'] ?? [];
    }
}
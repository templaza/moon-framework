<?php
/**
 * @package   Moon Framework
 * @author    Moon Framework Team https://moonframe.work
 * @copyright Copyright (C) 2025 MoonFrame.work.
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 or Later
 */
namespace local_moon\library\Helper;
defined('MOODLE_INTERNAL') || die;
class Settings
{
    public static function loadOptions($dir = ''): void
    {
        $options = array_filter(glob($dir . '/' . '*.php'), 'is_file');
        foreach ($options as $fname) {
            require_once($fname);
        }
    }
    public static function prepareManagerForm($settings): array
    {
        $form_content = [];
        foreach ($settings as $key => $setting) {
            $settings[$key]['name'] = $key;
        }
        usort($settings, function($a, $b) {
            return ($a['order'] ?? 0) <=> ($b['order'] ?? 0);
        });
        foreach ($settings as $key => $setting) {
            $fieldset = new \stdClass();
            $fieldset->name = $setting['name'];
            $fieldset->label = Text::_($setting['label'] ?? '');
            $fieldset->description = isset($setting['description']) ? Text::_($setting['description']) : '';
            $fieldset->icon = $setting['icon'] ?? '';
            $groups = [];
            foreach ($setting['fields'] as $gkey => $field) {
                if ($field['type'] == 'group') {
                    $groups[$gkey] = ['title' => Text::_($field['label']), 'icon' => ($field['icon'] ?? ''), 'description' => Text::_($field['description'] ?? ''), 'fields' => [], 'help' => ($field['help'] ?? ''), 'option-type' => ($field['option-type'] ?? '')];
                }
            }

            $groups['none'] = ['fields' => []];

            foreach ($setting['fields'] as $fkey => $field) {
                if ($field['type'] == 'group') {
                    continue;
                }

                $input = $field['attributes'] ?? [];
                $input['id'] = 'moon_form_' . $fkey;
                $input['name'] = 'params[' .$fkey .']';
                $input['type'] = 'astroid' . $field['type'];
                if (isset($field['options']) && is_array($field['options']) && count($field['options']) > 0) {
                    $input['options'] = [];
                    foreach ($field['options'] as $option_key => $option_text) {
                        $option = new \stdClass();
                        $option->value = $option_key;
                        $option->text = Text::_($option_text);
                        $input['options'][] = $option;
                    }
                }

                $field_group = $field['group'] ?? 'none';
                $field_tmp  =   [
                    'id'            =>  'moon_form_' . $fkey,
                    'name'          =>  $fkey,
                    'value'         =>  $field['value'],
                    'label'         =>  Text::_($field['label'] ?? ''),
                    'description'   =>  Text::_($field['description'] ?? ''),
                    'input'         =>  $input,
                    'type'          =>  'json',
                    'group'         =>  $fieldset->name,
                    'ngShow'        =>  self::replaceRelationshipOperators($field['conditions'] ?? ''),
                    'help'          =>  $field['help'] ?? '',
                ];

                $groups[$field_group]['fields'][] = $field_tmp;
            }
            // Get sidebar data
            $fieldset->childs   = $groups;
            $form_content[] = $fieldset;
        }
        return $form_content;
    }

    public static function replaceRelationshipOperators($str): array|string
    {
        $str = $str ? str_replace(" AND ", " && ", $str) : '';
        $str = $str ? str_replace(" OR ", " || ", $str) : '';
        return $str;
    }

    public static function loadLanguage(): array {
        $lang = current_language();
        return get_string_manager()->load_component_strings('local_moon', $lang);
    }
}
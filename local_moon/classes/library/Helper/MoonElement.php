<?php

/**
 * @package   Moon Framework
 * @author    Moon Framework Team https://moonframe.work
 * @copyright Copyright (C) 2025 MoonFrame.work.
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 or Later
 */

namespace local_moon\library\Helper;
defined('MOODLE_INTERNAL') || die;
class MoonElement {
    public string $name = '';
    public string $title = '';
    public string $description = '';
    public string $icon = '';
    public string $category = '';
    public string $element_type = '';
    public bool $multiple = true;
    public array $fields = [];
    protected string $_fieldSet = '';
    public function __construct($data = [])
    {
        $this->name = $data['name'] ?? '';
        $this->title = $data['title'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->icon = $data['icon'] ?? '';
        $this->category = $data['category'] ?? '';
        $this->element_type = $data['element_type'] ?? '';
        $this->multiple = $data['multiple'] ?? true;
        $this->fields = $data['fields'] ?? Constants::getElementDefaultOptions();
        $this->setFields();
    }
    public function addFieldSet($value, $key = ''): void
    {
        $fieldSet = $key;
        if (empty($fieldSet)) {
            $fieldSet = $this->_fieldSet;
        }
        if (!empty($fieldSet)) {
            $this->fields[$fieldSet] = $value;
        }
    }
    public function addMultiFieldSet($fields): void
    {
        $this->fields = $fields;
    }
    public function addField($field, $value, $fieldSet = ''): void
    {
        $_fieldSet = $fieldSet;
        if (empty($_fieldSet)) {
            $_fieldSet = $this->_fieldSet;
        }
        if (!empty($_fieldSet)) {
            $this->fields[$_fieldSet]['fields'][$field] = $value;
        }
    }
    public function setFields(): void {}
    public function getFields(): array
    {
        return $this->fields;
    }
    public function setFieldSet($fieldSet): void
    {
        $this->_fieldSet = $fieldSet;
    }
    public function getFieldSet(): string
    {
        return $this->_fieldSet;
    }
}
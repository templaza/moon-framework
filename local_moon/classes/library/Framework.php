<?php
/**
 * @package   Moon Framework
 * @author    Moon Framework Team https://moonframe.work
 * @copyright Copyright (C) 2025 MoonFrame.work.
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 or Later
 */
namespace local_moon\library;
defined('MOODLE_INTERNAL') || die;
class Framework {
    protected static $document = null;
    protected static $theme = null;
    public static function init($theme = null) {
        define('_MOON', 1); // define moon framework
        self::$theme = new Theme($theme);
        self::$document = new Document();
    }
    public static function getTheme($theme = null) : Theme
    {
        if (!self::$theme) {
            self::$theme = new Theme($theme);
        }
        return self::$theme;
    }
    public static function getDocument() : Document
    {
        if (!self::$document) {
            self::$document = new Document();
        }
        return self::$document;
    }
}
<?php
/**
 * @package   Moon Framework
 * @author    Moon Framework Team https://moonframe.work
 * @copyright Copyright (C) 2025 MoonFrame.work.
 * @license https://www.gnu.org/licenses/gpl-3.0.html GNU/GPLv3 or Later
 */
define('AJAX_SCRIPT', true);
require_once(__DIR__ . '/../../../config.php');

require_login();
require_sesskey();
$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/moon/ajax/save.php'));
use local_moon\library\Helper\Utilities;
use local_moon\library\Helper\Client;

header('Content-Type: application/json; charset=utf-8');

$jsondata = required_param('params', PARAM_RAW);
$theme_name = optional_param('theme', $PAGE->theme, PARAM_ALPHANUMEXT);
$client = new Client();
$data = \json_decode($jsondata, true);

try {
    if (!is_array($data)) {
        throw new Exception('Invalid JSON data');
    }
    foreach ($data as $field => $value) {
        Utilities::saveConfig($field, $value, 'theme_' . $theme_name);
    }
    $client->response('Theme Saved');
} catch (Exception $e) {
    $client->errorResponse($e);
}
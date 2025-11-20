<?php
defined('MOODLE_INTERNAL') || die();

// Nếu đang ở đúng trang settings mặc định của theme
if (!empty($_GET['section']) && $_GET['section'] === 'themesettingmoon') {
    redirect(new moodle_url('/local/moon/index.php?theme=moon'));
}
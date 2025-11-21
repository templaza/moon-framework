<?php
defined('MOODLE_INTERNAL') || die;
use local_moon\library\Helper\Utilities;
$region = $this->params->get('region', '');
echo Utilities::loadRegion($region);
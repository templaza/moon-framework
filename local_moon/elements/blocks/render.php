<?php
defined('MOODLE_INTERNAL') || die;
global $OUTPUT, $PAGE;
$region = $this->params->get('region', '');
if (empty($region)) {
    return;
}
$addblockbutton = $OUTPUT->addblockbutton($region);
$blockshtml = $OUTPUT->blocks($region);
$hasblocks = (strpos($blockshtml, 'data-block=') !== false || !empty($addblockbutton));
if ($hasblocks) {
    echo $addblockbutton;
    echo $blockshtml;
}
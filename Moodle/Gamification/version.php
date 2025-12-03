<?php
defined('MOODLE_INTERNAL') || die();

$plugin->component = 'local_quest';
$plugin->version = 2024011500;
$plugin->requires = 2020061500; // Moodle 3.9+
$plugin->maturity = MATURITY_ALPHA;
$plugin->release = '0.1.0';
$plugin->dependencies = [
    'mod_forum' => 2020061500,
    'mod_quiz' => 2020061500,
];
?>

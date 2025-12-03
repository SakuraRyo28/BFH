<?php
require_once('../../config.php');
require_once($CFG->dirroot . '/local/quest/lib.php');

$courseid = required_param('courseid', PARAM_INT);
$userid = optional_param('userid', $USER->id, PARAM_INT);

require_login($courseid);
$context = context_course::instance($courseid);
require_capability('local/quest:view', $context);

// Set up page
$PAGE->set_url('/local/quest/index.php', ['courseid' => $courseid]);
$PAGE->set_title(get_string('questdashboard', 'local_quest'));
$PAGE->set_heading(get_string('questdashboard', 'local_quest'));
$PAGE->requires->css(new moodle_url('/local/quest/styles.css'));

// Get data
$data = local_quest_get_dashboard_data($userid, $courseid);

echo $OUTPUT->header();

// Display dashboard
echo $OUTPUT->render_from_template('local_quest/quest_dashboard', $data);

echo $OUTPUT->footer();
?>

<?php
namespace local_quest;

defined('MOODLE_INTERNAL') || die();

class observer {
    
    public static function course_module_completed(\core\event\course_module_completion_updated $event) {
        global $DB, $USER;
        
        $data = $event->get_data();
        $cmid = $data['contextinstanceid'];
        
        // Get module info
        $cm = get_coursemodule_from_id('', $cmid, 0, false, MUST_EXIST);
        
        // Check quests for this module completion
        local_quest_check_completion(
            $USER->id,
            $cm->course,
            'mod_' . $cm->modname . '_completed',
            $cmid
        );
    }
    
    public static function user_loggedin(\core\event\user_loggedin $event) {
        global $DB, $USER;
        
        // Check for daily login quest
        $courses = enrol_get_my_courses();
        
        foreach ($courses as $course) {
            local_quest_check_completion(
                $USER->id,
                $course->id,
                'daily_login'
            );
        }
    }
    
    public static function forum_post_created(\mod_forum\event\post_created $event) {
        global $USER;
        
        $data = $event->get_data();
        $forumid = $data['other']['forumid'];
        
        // Check for forum posting quests
        local_quest_check_completion(
            $USER->id,
            $data['courseid'],
            'forum_post_created',
            $forumid
        );
    }
}
?>

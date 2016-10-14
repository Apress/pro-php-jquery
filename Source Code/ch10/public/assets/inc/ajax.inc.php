<?php

/*
 * Enable sessions
 */
session_start();

/*
 * Include necessary files
 */
include_once '../../../sys/config/db-cred.inc.php';

/*
 * Define constants for config info
 */
foreach ( $C as $name => $val )
{
    define($name, $val);
}

/*
 * Create a lookup array for form actions
 */
$actions = array(
        'event_view' => array(
                'object' => 'Calendar',
                'method' => 'displayEvent'
            ),
        'edit_event' => array(
                'object' => 'Calendar',
                'method' => 'displayForm'
            ),
        'event_edit' => array(
                'object' => 'Calendar',
                'method' => 'processForm'
            ),
        'delete_event' => array(
                'object' => 'Calendar',
                'method' => 'confirmDelete'
            ),
        'confirm_delete' => array(
                'object' => 'Calendar',
                'method' => 'confirmDelete'
            )
    );

/*
 * Make sure the anti-CSRF token was passed and that the
 * requested action exists in the lookup array
 */
if ( isset($actions[$_POST['action']]) )
{
    $use_array = $actions[$_POST['action']];
    $obj = new $use_array['object']($dbo);

    /*
     * Check for an ID and sanitize it if found
     */
    if ( isset($_POST['event_id']) )
    {
        $id = (int) $_POST['event_id'];
    }
    else { $id = NULL; }

    echo $obj->$use_array['method']($id);
}

function __autoload($class_name)
{
    $filename = '../../../sys/class/class.'
        . strtolower($class_name) . '.inc.php';
    if ( file_exists($filename) )
    {
        include_once $filename;
    }
}

?>
<?php
// Table Name
$tablename = 'tbl_sitepermissions_action_rule';

//Options line for comments, encoding and character set
$options = array('comment' => 'Bridge table used to keep a list of rules and actions.', 'collate' => 'utf8_general_ci', 'character_set' => 'utf8');

// Fields
$fields = array(
    'id' => array(
        'type' => 'text',
        'length' => 32
    ),
    'moduleid' => array(
        'type' => 'text',
        'length' => 32,
    ),
    'ruleid' => array(
        'type' => 'text',
        'length' => 32,
    ),
    'actionid' => array(
        'type' => 'text',
        'length' => 32,
    )
);

//create other indexes here...

$name = 'FK_action_rule';

$indexes = array(
    'fields' => array(
        'moduleid' => array(),
        'actionid' => array(),
        'ruleid' => array()
    )
);
?>
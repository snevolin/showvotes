<?php
/**
 * ShowVotes
 * by Stanislav Nevolin, stanislav@nevolin.info
 */
$config = array();

/**
 * Who can see voters:
 * "admin" — only admins
 * "author" — only topic author and admins
 * "user" — only all registered users and admins
 * "all" or any other value — all users including guests
 */
$config['can_see'] = "all";
/**
 * positive voters display limit
 * -1 = no limit
 */
$config['positive_display_limit'] = 20;
/**
 * negative voters display limit
 * -1 = no limit
 */
$config['negative_display_limit'] = 20;
/**
 * abstaining voters display limit
 * -1 = no limit
 */
$config['neutral_display_limit'] = 20;
/**
 * Enables topic_add date restriction.
 */ 
$config['topic_add_date_restriction'] = false;
/**
 * Voters will be displayed only in topics which date_add will be later than this value.
 * To disable it set $config['topic_add_date_restriction'] to false;
 */
$config['available_from_date'] = '2014-10-19 00:00:00';
return $config;
?>
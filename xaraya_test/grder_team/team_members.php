<?php
$output = array
(
    '0' => array
        (
            'id' => '56',
            'name' => 'Team 1',
            'course_id' => '9',
            'component_id' => '0',
            'members' => '265,266,267',
            'author' => '0',
            'timecreated' => '0',
            'timemodified' => '0',
            'state' => '3'
        ),

    '1' => Array
        (
            'id' => '57',
            'name' => 'Team 2',
            'course_id' => '9',
            'component_id' => '0',
            'members' => '268,269,270',
            'author' => '0',
            'timecreated' => '0',
            'timemodified' => '0',
            'state' => '3'
        )

);
echo "<pre>";
echo "ouput = ";print_r($output);
$team_members = array();
foreach ($output as $team) {
	$team_members_explode = explode(',', $team['members']);
	$team_members = array_merge($team_members, $team_members_explode);
	// echo "<br>tm = "; print_r($team_members);
}
echo "</pre><br>team_members=  "; print_r($team_members);
echo "</pre>";
?>
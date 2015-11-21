<?php
$menulinks = array( 
	'0' => array
        (
            'url' => 'http://192.168.0.65:90/xd-dt/luetoff-caroll/devp/html/index.php?module=grader&type=user&func=view_participant_feedback',
            'title' => 'View the course component feedback sheets',
            'label' => 'Component Grade Sheets',
        	'active' => 'view_participant_feedback'
        ),

    '1' => array
        (
            'url' => 'http://192.168.0.65:90/xd-dt/luetoff-caroll/devp/html/index.php?module=grader&type=user&func=view_participant_grade_sheets',
            'title' => 'View the summary course grade sheets',
            'label' => 'Course Grade Sheets',
        'active' => 'view_participant_grade_sheets'
        ),

    '2' => array
        (
            'url' => 'http://192.168.0.65:90/xd-dt/luetoff-caroll/devp/html/index.php?module=grader&type=user&func=send_custom_email',
            'title' => 'Create a custom email',
            'label' => 'Create Custom Email',
        'active' => 'send_custom_email'
        ),

    '3' => array
        (
            'url' => 'http://192.168.0.65:90/xd-dt/luetoff-caroll/devp/html/index.php?module=grader&type=user&func=set_center',
            'title' => 'Set the current center',
            'label' => 'Set Center',
        'active' => 'set_center'
        ),

    '4' => array
        (
            'url' => 'http://192.168.0.65:90/xd-dt/luetoff-caroll/devp/html/index.php?module=grader&type=user&func=user_configuration',
            'title' => 'Manage personal configuration settings',
            'label' => 'Configuration',
        'active' => array('user_configuration'),
        'isactive'=>0
        ),

    '5' => array
        (
            'url' => 'http://192.168.0.65:90/xd-dt/luetoff-caroll/devp/html/index.php?module=grader&type=user&func=utilities',
            'title' => 'Utility functions for different tasks',
            'label' => 'Utilities',
        'active' => 'utilities'
        )
);
//  echo "<pre> before v is => "; print_r($menulinks); echo "</pre>"; 
$args['funcname'] = 'user_configuration';

foreach ($menulinks as $k => $v) {
	
		if (!empty($v['active']) && is_array($v['active']) && in_array($args['funcname'], $v['active']) ) {
	//if ((!empty($v['active']) && is_array($v['active']) && in_array($args['funcname'], $v['active'])) || $v['url'] == $currenturl) {
            $menulinks[$k]['isactive'] = 1;
                
            } else {
                $menulinks[$k]['isactive'] = 0;
            }
  echo "<pre>after v is => "; print_r($menulinks); echo "</pre>";  
}
       
 ?>
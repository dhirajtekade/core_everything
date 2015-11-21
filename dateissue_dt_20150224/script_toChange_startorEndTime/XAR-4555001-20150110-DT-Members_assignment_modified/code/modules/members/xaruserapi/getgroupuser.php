<?php
/**
 * Members Module
 *
 * @package modules
 * @subpackage members module
 * @category Third Party Xaraya Module
 * @version 2.0.0
 * @copyright (C) 2013 Netspan AG
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html}
 * @author Marc Lutolf <mfl@netspan.ch>
 */

/**
 * Returns the parent list of a list
 *
 * @author Marc Lutolf <marcinmilan@xaraya.com>
 * @return array of role objects
 */
 
function members_userapi_getgroupuser($args){
	
    extract($args);
    $result = array();	
	
	
	$xartable =& xarDB::getTables();
    $dbconn = xarDB::getConn(); 
    
	$query = new Query('SELECT');
	    
	    // These tables are used by the members object
	    $query->addtable($xartable['members_members'],'mm');
	    $query->addtable($xartable['roles'],'role');
	    $query->join('mm.role_id', 'role.id');
	
	    // This table holds the list information
	    $query->addtable($xartable['members_members_lists'],'mml');
	    $query->join('mml.member_id', 'role.id');
	    
	    // We are looking for the members assigned to a particular list
	    $query->eq('mml.list_id', $list_id);
	    // We only want groups, not users
	    $query->eq('role.itemtype', xarRoles::ROLES_GROUPTYPE);
	    // If a state parameter was passed, filter on that. Otherwise return members of ll states
	    if (isset($args['state'])) $query->eq('mm.state', $args['state']);
	    
	    // Now add the fields we want, which in this case is just the IDs
	    $query->addfield('role.id');
	    // $query->addfield('mm.name');
	    // $query->addfield('mm.first_name');
	    // $query->addfield('mm.last_name');
	    // $query->addfield('role.email');

	    if(!$query->run()) return;
	    $group_result = $query->output();
		 
# --------------------------------------------------------
#
# Get all the subgroups of the above groups and put all into one array
#
	    // Created one array to store all the groups and its subgroup id
	    $groups_all = array();
	    foreach ($group_result as $group){
	        $groupId = $group['id'];
	        $groups = xarMod::apiFunc('roles', 'user', 'getallgroups',array('ancestor' => $groupId, 'show_top' => true));
	        // We need the IDs of the groups: convenient to get them from the keys
	        $groupskeys = array_keys ($groups);
	        $groups_all = array_merge($groups_all, $groupskeys);
	    }
	    $groups_all = array_unique($groups_all);
	
# --------------------------------------------------------
#
# Get the users of these subgroups
#
	    // For each role.id of the above get user
	    foreach ($groups_all as $key => $groupId){
	        $query = new Query('SELECT');
	
	        // These tables are used by the members object
	        $query->addtable($xartable['members_members'],'mm');
	        $query->addtable($xartable['roles'],'role');
	        $query->join('mm.role_id', 'role.id');
	        
	        // This table holds the group hierarchy information
	        $query->addtable($xartable['rolemembers'],'rm');  
	        $query->join('rm.role_id', 'role.id');
	                        
	        // Now add the fields we want
	        $query->addfield('role.id');
	        $query->addfield('mm.name');		                      
	        $query->addfield('mm.first_name');
	        $query->addfield('mm.last_name');
	        $query->addfield('role.email');
	        
	        // We are looking for the members of a particular group
	        $query->eq('rm.parent_id', $groupId);
	        // We only want users, not groups
	        $query->eq('role.itemtype', xarRoles::ROLES_USERTYPE);
	        // If a state parameter was passed, filter on that. Otherwise return members of ll states
	        if (isset($args['state'])) $query->eq('mm.state', $args['state']);
	                   
	        // $query->qecho();     //to print query.
			if(!$query->run()) return;
	        $result = $query->output();

			$user_result_all = array_merge($user_result_all, $result);
	    }
	    return $user_result_all;
	}
?>
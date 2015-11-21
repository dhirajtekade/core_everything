<?php
/**
 * Function to add the data of the user for whom the message is sent.
 *
 * @package modules
 * @copyright (C) copyright-placeholder 
 * @license GPL {@link http://www.gnu.org/licenses/gpl.html} 
 * @link http://www.xaraya.com 
 * @subpackage Members Module 
 * @link link-placeholder 
 * @author Param Software Services <paramsoft@eth.net>
 */
    
function members_userapi_getusers_memberlist($args)
{
    extract($args);
    $result = array();
    $userrealmid = 0; 

    if (xarMod::isAvailable('realms')) {
        $userrealmid = xarMod::apiFunc('realms', 'admin', 'getrealmid');
    }
    
    $xartable =& xarDB::getTables();
    $dbconn = xarDB::getConn(); 

	$result = xarMod::apiFunc('members', 'user', 'getsublists',array('list_id' => $list_id));
	$user_result_all = array();
	foreach($result as $listId) {	
			
		$list_id = $listId[0];
		
		$query = new Query('SELECT');
	    
		// These tables are used by the members object
	    $query->addtable($xartable['members_members'],'mm');
	    $query->addtable($xartable['roles'],'role');
	    $query->join('mm.role_id', 'role.id');
	
	    // This table holds the list information
	    $query->addtable($xartable['members_members_lists'],'mml');
	    $query->join('mml.member_id', 'role.id');
	    
	    // We are looking for the members assigned to a particular list
	    $query->eq('mml.list_id', $list_id[0]);
	    // We only want users, not groups
	    $query->eq('role.itemtype', xarRoles::ROLES_USERTYPE);
	    // If a state parameter was passed, filter on that. Otherwise return members of ll states
	    if (isset($args['state'])) $query->eq('mm.state', $args['state']);
	    
	    // Now add the fields we want
	    $query->addfield('role.id');
	    $query->addfield('mm.name');
	    $query->addfield('mm.first_name');
	    $query->addfield('mm.last_name');
	    $query->addfield('role.email');
		
	    // Run the query
	    if(!$query->run()) return;
	    $user_result = $query->output();
	    $user_result_all = array_merge($user_result_all, $user_result);
	    	
# --------------------------------------------------------
#
# Next get all the groups assigned to the list
#
	   $user_result_all = xarMod::apiFunc('members', 'user', 'getgroupuser',array('user_result_all' => $user_result_all, 'list_id' => $list_id));
	}

    // Added below code, as array_unqiue function not provides correct records
    $result = array();
    foreach ($user_result_all as $user) {
        $result[$user['id']] = $user;
    }/*echo '<pre>';
    print_r($result); exit;*/
    return $result;
}
?>
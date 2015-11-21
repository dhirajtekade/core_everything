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
    
function members_userapi_getsublists($args)
{
    extract($args);
    $result = array();
    $userrealmid = 0; 

    if (xarMod::isAvailable('realms')) {
        $userrealmid = xarMod::apiFunc('realms', 'admin', 'getrealmid');
    }
    $xartable =& xarDB::getTables();
    $dbconn = xarDB::getConn(); 

# --------------------------------------------------------
#
# Get left_id for the given list_id
#
    $query = new Query('SELECT');
	$query->addtable($xartable['members_lists'],'ml');
	$query->addfield('ml.left_id');
	$query->eq('ml.id', $list_id);
	if(!$query->run()) return;
	$left_id = $query->output();
	
# --------------------------------------------------------
#
# Get all sublists of the given list_id including the list itself
#
	$bindvars = array($left_id[0]['left_id']);
	$statement = 
		"SELECT child.id FROM " . 
		$xartable['members_lists'] . " AS parent, " . 
		$xartable['members_lists'] . " AS child " .
		"WHERE child.left_id BETWEEN parent.left_id AND parent.right_id " .
		"AND parent.left_id = ?";	
	$q = $dbconn->prepareStatement($statement);
	$result = $q->executeQuery($bindvars);

	return $result;

}


?>
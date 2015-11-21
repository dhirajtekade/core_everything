<?php

class CCelkoNastedSet { 

   var $TableName; 
   var $FieldID; 
   var $FieldIDParent; 
   var $FieldLeft; 
   var $FieldRight; 
   var $FieldDiffer;
   var $FieldLevel; 
   var $FieldOrder; 
   var $FieldIgnore; 
   
   var $TransactionTable; 
   var $_IsInTransaction; 
   var $_TransactionTStamp; 

   var $MyLink; 
   
   function CCelkoNastedSet () 
	{ 
	   $this->TableName = "tblCelkoTree";  
	   $this->FieldID = "IDNode"; 
	   $this->FieldIDParent = "IDParent"; 
	   $this->FieldLeft = "NSLeft"; 
	   $this->FieldRight = "NSRight"; 
	   $this->FieldDiffer = "NSDiffer";
	   $this->FieldLevel = "NSLevel";  
	   $this->FieldOrder = "NSOrder"; 
	   $this->FieldIgnore = "NSIgnore"; 
	
	   $this->TransactionTable = "tblCelkoTransTable";  
	   $this->_IsInTransaction = false;
	   $this->_TransactionTStamp = 0;
	
	   $this->MyLink = null;  
	} 
	
	function _safe_set (&$var_true, $var_false = "")
	{
		if (!isset ($var_true)) 
		{ $var_true = $var_false; }
	}
} 

?>
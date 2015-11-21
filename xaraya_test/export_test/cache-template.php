<?php 


<div class="xar-mod-body">
<?php 

 $title=xarML('Summary Grade Sheets');$_bl_data["title"]=$title;
 
 echo xarTpl::includeTemplate("module","grader","title",$_bl_data,"includes","");
 ?>
 <form method="post" action="<?php echo xarServer::getCurrentURL();?>" style="margin-top: 10px; margin-bottom: 10px;"><div class="xar-row"><div class="xar-col"><label for="charge_id" title="<?php echo xarML('The feedback course');?>"><?php echo xarML('            
                        Choose a course:            
                    ');?></label></div><div class="xar-col"><?php $options=xarMod::apiFunc('grader','user','get_courses', array('center_id' => $center_id, 'fieldlist' => xarModVars::get('grader', 'course_fields')));$_bl_data["options"]=$options;
 $firstline=xarML('Choose a course');$_bl_data["firstline"]=$firstline;
 $firstline="0,$firstline";$_bl_data["firstline"]=$firstline;
 $onchange="javascript:this.form.submit();";$_bl_data["onchange"]=$onchange;
 try{sys::import('modules.dynamicdata.class.properties');$property =& DataPropertyMaster::getProperty(array('type'=>"dropdown",'name'=>"course_id",'value'=>$course_id,'options'=>$options,'firstline'=>$firstline,'onchange'=>$onchange,));echo $property->showInput(array('type'=>"dropdown",'name'=>"course_id",'value'=>$course_id,'options'=>$options,'firstline'=>$firstline,'onchange'=>$onchange,));}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";}?></div></div><?php if(!empty($sections)) {
?><

div class="xar-row"><div class="xar-col"><label for="charge_id" title="<?php echo xarML('The feedback course section');?>"><?php echo xarML('            
                            Choose a course section:            
                        ');?></label></div><div class="xar-col"><?php $section_options=xarMod::apiFunc('grader','user','get_course_sections', array('course_id' => $course_id));$_bl_data["section_options"]=$section_options;
 $firstline=xarML('Choose a section');$_bl_data["firstline"]=$firstline;
 $firstline="0,$firstline";$_bl_data["firstline"]=$firstline;
 try{sys::import('modules.dynamicdata.class.properties');$property =& DataPropertyMaster::getProperty(array('type'=>"dropdown",'name'=>"section_id",'value'=>$section_id,'options'=>$section_options,'firstline'=>$firstline,));echo $property->showInput(array('type'=>"dropdown",'name'=>"section_id",'value'=>$section_id,'options'=>$section_options,'firstline'=>$firstline,));}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";}?></div></div><?php } else {?><input type="hidden" name="section_id" id="section_id" value="<?php echo $section_id;?>"/><?php }
?><div class="xar-row"><div class="xar-col"><!--Empty tag workaround for div tag--></div><div class="xar-col"><?php $label=xarML('Refresh');$_bl_data["label"]=$label;
 ?></div></div></form><?php if(!empty($course_id) AND (!empty($section_id) OR empty($sections))) {
 $xmldata='grade_sheets';$_bl_data["xmldata"]=$xmldata;
  if($tab == 'data') {
?><xar:calculation xmlns:xar="http://xaraya.com/2004/blocklayout"/><?php if(xarMod::isAvailable('export')) {
?><div style="float:right"><?php try{sys::import('modules.dynamicdata.class.properties');$property =& DataPropertyMaster::getProperty(array('type'=>"urlexport",'source'=>"listing.grader_grade_sheets",'filename'=>"grade_sheet",'filetype'=>"xlsx",'export'=>1,));echo $property->showOutput(array('type'=>"urlexport",'source'=>"listing.grader_grade_sheets",'filename'=>"grade_sheet",'filetype'=>"xlsx",'export'=>1,));}catch(Exception $e){}?></div><?php }
?><form method="post" action="<?php echo xarServer::getCurrentURL();?>"><fieldset><?php if(!empty($component_ids)) {
 if(!empty($participants)) {
?><table cellpadding="1"><tr><th style="text-align: center"><?php echo xarML('
                                            Participant
                                        ');?></th><?php $exportitems=array('Participant');$_bl_data["exportitems"]=$exportitems;
 $weights=array();$_bl_data["weights"]=$weights;
 foreach($component_ids as $component_id) {
    ?><th style="text-align: center; vertical-align: text-top;"><?php $value=$components[$component_id]['course_weight'];$_bl_data["value"]=$value;
 $dummy=1;$weights[$component_id] = $value;$_bl_data["dummy"]=$dummy;
 echo xarML('
                                                ('); if (isset($number)){echo $number->showOutput(array('value'=>$value,));} echo xarML('%)
                                                ');?><br/><?php echo xarML(''.$components[$component_id]['component_name']);?></th><?php $exportitems=array_merge($exportitems, array($components[$component_id]['component_name']));$_bl_data["exportitems"]=$exportitems;
 }?><th style="text-align: center"><?php echo xarML('
                                            Total
                                        ');?></th><th style="text-align: center"><?php echo xarML('
                                            Grade
                                        ');?></th><th style="text-align: center"><?php echo xarML('
                                            Comment
                                        ');?></th><th style="text-align: center"><?php echo xarML('
                                            Action
                                        ');?></th></tr><tr><th style="text-align: center"><?php echo xarML('
                                             
                                        ');?></th><?php foreach($charge_ids as $key => $charge) {
     $dummy=$charges->getItem(array('itemid' => $charge));$_bl_data["dummy"]=$dummy;
?><th style="text-align: center"><?php if(!empty($components[$component_ids[$key]]['component_charge_name'])) {
 echo xarML(''.$components[$component_ids[$key]]['component_charge_name']); } else { echo xarML(''.$charges->properties['name']->value); }
?></th><?php }?><th colspan="4"><?php echo xarML('
                                             
                                        ');?></th></tr><?php $exportitems=array_merge($exportitems,array('Total','Grade','Comment','Action'));$_bl_data["exportitems"]=$exportitems;
 $values=array();$_bl_data["values"]=$values;
 foreach($participants as $participant) {
     if(!empty($export)) {
 if(!empty($exportitems)) {
 $firstrow=array_values($exportitems);$_bl_data["firstrow"]=$firstrow;
 $labels=array();$_bl_data["labels"]=$labels;
 foreach($firstrow as $column) {
     $labels[$column]=$object->properties[$column]->label;$_bl_data["labels[$column]"]=$labels[$column];
 } $values=array($labels);$_bl_data["values"]=$values;
 $fields=array();$_bl_data["fields"]=$fields;
 foreach($firstrow as $column) {
     echo xarML(''.$object->properties[$column]->setValue($row[$column])); $basetype=$object->properties[$column]->basetype;$_bl_data["basetype"]=$basetype;
 if(basetype == 'decimal') {
 $fields[$column]=$object->properties[$column]->value;$_bl_data["fields[$column]"]=$fields[$column];
 }
 if(basetype != ('decimal' OR 'numeric' OR 'decimal') ) {
 $fields[$column]=$object->properties[$column]->getValue();$_bl_data["fields[$column]"]=$fields[$column];
 }
 } $values=$fields;$_bl_data["values"]=$values;
 }
 $listing=xarSession::setVar('listing.grader_grade_sheets','a');$_bl_data["listing"]=$listing;
 $listing=xarSession::setVar('listing.grader_grade_sheets', 'a');$_bl_data["listing"]=$listing;
 echo xarML('
											xarSession::setVar(\'listing.grader_grade_sheets\',\'a\')
                    						
                    					'); }
 $sumfield="coursegrades" . $participant['id'] . "_grades_total";$_bl_data["sumfield"]=$sumfield;
 $termfield="weighted_" . $participant['id'];$_bl_data["termfield"]=$termfield;
 $finalfield="oldcoursegrades" . $participant['id'] . "grade_final";$_bl_data["finalfield"]=$finalfield;
 $oldgradesfield="oldgrades_" . $participant['id'];$_bl_data["oldgradesfield"]=$oldgradesfield;
 $newgradesfield="newgrades_" . $participant['id'];$_bl_data["newgradesfield"]=$newgradesfield;
?><script type="text/javascript">
                                            function setcalc_<?php echo $participant['id'];?>(){ 
                                                $(document).ready(
                                                    function (){
                                                      // update the plug-in version
                                                      $("#idPluginVersion").text($.Calculation.version);
                                                      function recalc(){
                                                        var sum=$(":input[id^='<?php echo $termfield;?>']").sum();
                                                        $(":input[id^=<?php echo $sumfield;?>]").val(sum);
                                                      }
                                                      recalc();
                                                      function recalcfinal() {
                                                      	$(":input[id^=<?php echo $finalfield;?>]").val('');
                                                      }
                                                      $(":input[id^=<?php echo $oldgradesfield;?>]").bind("keyup", recalc);
                                                      $(":input[id^=<?php echo $newgradesfield;?>]").bind("keyup", recalc);
                                                      $(":input[id^=<?php echo $oldgradesfield;?>]").bind("keyup", recalcfinal);
                                                      $(":input[id^=<?php echo $newgradesfield;?>]").bind("keyup", recalcfinal);
                                                    }
                                                );
                                            }
                                            setcalc_<?php echo $participant['id'];?>();
                                        </script><tr><td style="text-align: left"><?php echo xarML(''.$enrollments[$participant['members_id']]['sequence'].' 
                                                '); if (isset($name)){echo $name->showOutput(array('value'=>$participant['name'],));}?></td><?php $total=0;$_bl_data["total"]=$total;
 foreach($component_ids as $component_id) {
     $weightedid="weighted_" . $participant['id'] . "_" . $component_id;$_bl_data["weightedid"]=$weightedid;
 $onchange='javascript: setweighted_' . $participant['id'] . "_" . $component_id . '()';$_bl_data["onchange"]=$onchange;
?><td style="text-align: center"><?php if(isset($grades[$participant['id']][$component_id])) {
 $grade=round($grades[$participant['id']][$component_id]['grade']);$_bl_data["grade"]=$grade;
 $grade_raw=round($grades[$participant['id']][$component_id]['grade_raw']);$_bl_data["grade_raw"]=$grade_raw;
 $thisname="oldgrades[" . $grades[$participant['id']][$component_id]['id'] . "]";$_bl_data["thisname"]=$thisname;
 $thisid="oldgrades_" . $participant['id'] . "_" . $component_id;$_bl_data["thisid"]=$thisid;
?><script type="text/javascript">
                                                            function setweighted_<?php echo $participant['id'];?>_<?php echo $component_id;?>(){ 
                                                                var weighted = document.getElementById('<?php echo $thisid;?>').value * <?php echo $components[$component_id]['course_weight'];?>/100;
                                                                document.getElementById('<?php echo $weightedid;?>').value = weighted;
                                                                setcalc_<?php echo $participant['id'];?>();
                                                            }
                                                        </script><?php if($components[$component_id]['allow_adjustments'] != 0) {
 try{if (isset($number)){echo $number->showInput(array('property'=>$number,'name'=>$thisname,'id'=>$thisid,'value'=>$grade,'onchange'=>$onchange,'style'=>"width: 40px",));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} if($components[$component_id]['allow_adjustments'] == 2) {
 echo xarML('
                                                                 [
                                                                '); if (isset($integerbox)){echo $integerbox->showOutput(array('name'=>$thisname,'id'=>$thisid,'value'=>$grade_raw,));} echo xarML('
                                                                ]
                                                            '); }
 $weightedgrade=$grade * $components[$component_id]['course_weight']/100;$_bl_data["weightedgrade"]=$weightedgrade;
 } else { if (isset($integerbox)){echo $integerbox->showOutput(array('name'=>$thisname,'id'=>$thisid,'value'=>$grade_raw,));} try{if (isset($number)){echo $number->showHidden(array('name'=>"hidden",'id'=>$thisid,'value'=>$grade_raw,'onchange'=>$onchange,));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} $weightedgrade=$grade_raw * $components[$component_id]['course_weight']/100;$_bl_data["weightedgrade"]=$weightedgrade;
 }
 $total=$total + $weightedgrade;$_bl_data["total"]=$total;
 try{if (isset($number)){echo $number->showHidden(array('name'=>"hidden",'id'=>$weightedid,'value'=>$weightedgrade,));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} } else { $thisname="newgrades[" . $participant['id'] . "][" . $component_id . "]";$_bl_data["thisname"]=$thisname;
 $thisid="newgrades_" . $participant['id'] . "_" . $component_id;$_bl_data["thisid"]=$thisid;
?><script type="text/javascript">
                                                            function setweighted_<?php echo $participant['id'];?>_<?php echo $component_id;?>(){ 
                                                                var weighted = document.getElementById('<?php echo $thisid;?>').value;
                                                                document.getElementById('<?php echo $weightedid;?>').value = weighted;
                                                                setcalc_<?php echo $participant['id'];?>();
                                                            }
                                                        </script><?php try{if (isset($number)){echo $number->showInput(array('property'=>$number,'name'=>$thisname,'id'=>$thisid,'value'=>0,'onchange'=>$onchange,'style'=>"width: 40px",));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} try{if (isset($number)){echo $number->showHidden(array('name'=>"hidden",'id'=>$weightedid,'value'=>0,));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} }
?></td><?php }?><td style="text-align: center"><?php if(isset($course_grades[$participant['id']])) {
 $grade=$course_grades[$participant['id']]['grades_total'];$_bl_data["grade"]=$grade;
 $thisname="oldcoursegrades[" . $participant['id'] . "][grades_total]";$_bl_data["thisname"]=$thisname;
 if(false) {
 try{if (isset($number)){echo $number->showInput(array('property'=>$number,'name'=>$thisname,'id'=>$sumfield,'value'=>$total,'style'=>"width: 40px",));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} } else { try{if (isset($number)){echo $number->showInput(array('property'=>$number,'name'=>$thisname,'id'=>$sumfield,'value'=>$total,'style'=>"width: 40px",));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} }
 } else { $thisname="newcoursegrades[" . $participant['id'] . "][grades_total]";$_bl_data["thisname"]=$thisname;
 try{if (isset($number)){echo $number->showInput(array('property'=>$number,'name'=>$thisname,'id'=>$sumfield,'value'=>$total,'style'=>"width: 40px",));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} }
?></td><td style="text-align: center"><?php if(($grade_calculation != GRADER_CALCULATION_MANUAL)) {
 if(isset($course_grades[$participant['id']])) {
 $grade=$course_grades[$participant['id']]['grade_final'];$_bl_data["grade"]=$grade;
 $thisname="oldcoursegrades[" . $participant['id'] . "][grade_final]";$_bl_data["thisname"]=$thisname;
 $thisid="oldcoursegrades" . $participant['id'] . "grade_final";$_bl_data["thisid"]=$thisid;
?><input type="text" name="<?php echo $thisname;?>" id="<?php echo $thisid;?>" value="<?php echo $grade;?>" readonly="readonly" style="width: 40px"/><?php } else { $thisname="newcoursegrades[" . $participant['id'] . "][grade_final]";$_bl_data["thisname"]=$thisname;
 $thisid="newcoursegrades" . $participant['id'] . "_grade_final";$_bl_data["thisid"]=$thisid;
?><input type="text" name="<?php echo $thisname;?>" id="<?php echo $thisid;?>" value="" readonly="readonly" style="width: 40px"/><?php }
 } else { if(isset($course_grades[$participant['id']])) {
 $grade=$course_grades[$participant['id']]['grade_final'];$_bl_data["grade"]=$grade;
 $thisname="oldcoursegrades[" . $participant['id'] . "][grade_final]";$_bl_data["thisname"]=$thisname;
 $thisid="oldcoursegrades" . $participant['id'] . "grade_final";$_bl_data["thisid"]=$thisid;
 try{if (isset($textbox)){echo $textbox->showInput(array('property'=>$textbox,'name'=>$thisname,'id'=>$thisid,'value'=>$grade,'style'=>"width: 40px",));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} } else { $thisname="newcoursegrades[" . $participant['id'] . "][grade_final]";$_bl_data["thisname"]=$thisname;
 $thisid="newcoursegrades" . $participant['id'] . "_grade_final";$_bl_data["thisid"]=$thisid;
 try{if (isset($textbox)){echo $textbox->showInput(array('property'=>$textbox,'name'=>$thisname,'id'=>$thisid,'value'=>"",'style'=>"width: 40px",));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} }
 }
?></td><td style="text-align: center"><?php if(isset($course_grades[$participant['id']])) {
 $grade=$course_grades[$participant['id']]['public_comment'];$_bl_data["grade"]=$grade;
 $thisname="oldcoursegrades[" . $participant['id'] . "][public_comment]";$_bl_data["thisname"]=$thisname;
 $thisid="oldcoursegrades" . $participant['id'] . "_public_comment";$_bl_data["thisid"]=$thisid;
 try{if (isset($textarea)){echo $textarea->showInput(array('property'=>$textarea,'name'=>$thisname,'id'=>$thisid,'value'=>$grade,'style'=>"width: 200px",));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} } else { $thisname="newcoursegrades[" . $participant['id'] . "][public_comment]";$_bl_data["thisname"]=$thisname;
 $thisid="newcoursegrades" . $participant['id'] . "_public_comment";$_bl_data["thisid"]=$thisid;
 try{if (isset($textarea)){echo $textarea->showInput(array('property'=>$textarea,'name'=>$thisname,'id'=>$thisid,'value'=>"",'style'=>"width: 200px",));}}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";} }
?></td><td style="text-align: center"><?php sys::import('modules.dynamicdata.class.properties.master');$_access=DataPropertyMaster::getProperty(array('type'=>'access'));if ($_access->check(array('level'=>700,))) {
?><a href="<?php echo xarModURL('grader','user','send_course_email',array('participant_id' => $participant['id'], 'course_id' => $course_id));?>" title="Send an email of this sheet"><?php if(xarModVars::get('grader','use_module_icons')) {
?><img src="<?php echo xarTpl::getImage('icons/'.'mail.png', 'base');?>" style="margin-right: 5px; vertical-align: top;"/><?php } else {?><b style="margin-right: 5px"><?php echo xarML('E');?></b><?php }
?></a><?php } sys::import('modules.dynamicdata.class.properties.master');$_access=DataPropertyMaster::getProperty(array('type'=>'access'));if ($_access->check(array('level'=>200,))) {
?><a href="<?php echo xarModURL('grader','user','create_pdf_participant_grade_sheet',array('id' => $participant['id'], 'course_id' => $course_id));?>" title="Display a PDF of this sheet"><?php if(xarModVars::get('grader','use_module_icons')) {
?><img src="<?php echo xarTpl::getImage('icons/'.'document-save.png', 'base');?>" style="margin-right: 5px; vertical-align: top;"/><?php } else {?><b style="margin-right: 5px"><?php echo xarML('P');?></b><?php }
?></a><?php } sys::import('modules.dynamicdata.class.properties.master');$_access=DataPropertyMaster::getProperty(array('type'=>'access'));if ($_access->check(array('level'=>200,))) {
?><a href="<?php echo xarModURL('grader','user','display_participant_grade_sheet',array('id' => $participant['id'], 'course_id' => $course_id));?>" title="Display this sheet"><?php if(xarModVars::get('grader','use_module_icons')) {
?><img src="<?php echo xarTpl::getImage('icons/'.'display.png', 'base');?>" style="margin-right: 5px; vertical-align: top;"/><?php } else {?><b style="margin-right: 5px"><?php echo xarML('S');?></b><?php }
?></a><?php }?></td></tr><?php }?></table><?php } else {?><div style="text-align: center"><?php echo xarML('
                                    No participants for this course
                                ');?></div><?php }
 } else {?><div style="text-align: center"><?php echo xarML('
                                No components available for this course
                            ');?></div><?php }
?></fieldset><div class="xar-row"><div class="xar-col"><!--Empty tag workaround for div tag--></div><div class="xar-col"><input type="hidden" name="authid" id="authid" value="<?php echo xarSecGenAuthKey();?>"/><input type="hidden" name="confirm" id="confirm" value="true"/><input type="hidden" name="tab" id="tab" value="<?php echo $tab;?>"/><?php $label=xarML('Cancel');$_bl_data["label"]=$label;
 echo xarTplModule('themes','user','buttontag',array('type'=>"cancel",'value'=>$label,)); echo xarML(' 
                            '); $label=xarML('Refresh');$_bl_data["label"]=$label;
 echo xarTplModule('themes','user','buttontag',array('type'=>"submit",'value'=>$label,'name'=>"refresh",)); echo xarML(' 
                            '); $label=xarML('Update');$_bl_data["label"]=$label;
 echo xarTplModule('themes','user','buttontag',array('type'=>"submit",'label'=>$label,'class'=>"btn-primary",));?></div></div></form><?php } elseif($tab == 'distribution') {
?><form method="post" action="<?php echo xarServer::getCurrentURL();?>"><table style="margin-top: 10px; margin-bottom: 10px"><tr><td style="vertical-align: top; text-align: left; width: 150px"><?php echo xarML('
                               Description
                               ');?><br/><?php echo xarML('
                               Grade
                               ');?><br/><?php echo xarML('
                               Ideal distribution 
                               ');?><br/><?php echo xarML('
                               Actual minimal score 
                            ');?></td><?php $binwidth=80/(count($bins)+1);$_bl_data["binwidth"]=$binwidth;
 $index=0;$_bl_data["index"]=$index;
?><td style="vertical-align: top; text-align: center; width: <?php echo $binwidth;?>%"><?php echo xarML('
                                
                               ');?><br/><?php echo xarML('
                                 
                               ');?><br/><?php echo xarML('
                                 
                               ');?><br/><?php echo xarML('
                                 
                            ');?></td><?php foreach($bins as $bin) {
     $index=$index + 1;$_bl_data["index"]=$index;
 $binname='coursebins[' . $index . ']';$_bl_data["binname"]=$binname;
 $binid='coursebins_' . $index;$_bl_data["binid"]=$binid;
?><td style="vertical-align: top; text-align: center; width: <?php echo $binwidth;?>%"><?php echo xarML(''.$bin['description']);?><br/><?php echo xarML(''.$bin['name']);?><br/><?php echo xarML(''.$bin['percentage'].'%
                                    ');?><br/><?php if(isset($coursebins[$bin['name']])) {
 $value=$coursebins[$bin['name']]['percentage'];$_bl_data["value"]=$value;
 } else { $value=0;$_bl_data["value"]=$value;
 }
 try{sys::import('modules.dynamicdata.class.properties');$property =& DataPropertyMaster::getProperty(array('type'=>"textbox",'name'=>$binname,'id'=>$binid,'style'=>"width: 50px; text-align: center",'value'=>$value,));echo $property->showInput(array('type'=>"textbox",'name'=>$binname,'id'=>$binid,'style'=>"width: 50px; text-align: center",'value'=>$value,));}catch(Exception $e){if(xarModVars::get('dynamicdata','debugmode')&&in_array(xarUser::getVar('id'),xarConfigVars::get(null, 'Site.User.DebugAdmins')))echo "<pre>".$e->getMessage()."</pre>";}?></td><?php }?></tr></table><div><?php $idealdata=array();$_bl_data["idealdata"]=$idealdata;
 foreach($bins as $bin) {
     if(isset($ideal_allocations[$bin['name']])) {
 $dummy=1; $idealdata[] = array($bin['name'], $ideal_allocations[$bin['name']]['participants']);$_bl_data["dummy"]=$dummy;
 }
 } $realdata=array();$_bl_data["realdata"]=$realdata;
 foreach($bins as $bin) {
     if(isset($bin_allocations[$bin['name']])) {
 $dummy=1; $realdata[] = array($bin['name'], $bin_allocations[$bin['name']]['participants']);$_bl_data["dummy"]=$dummy;
 }
 } $data=
                            array(
                                array(
                                    'data' => $idealdata,
                                    'label' => 'Ideal',
                                    'bars' => array('show' => true, 'barWidth' => 0.3, 'align' => 'center'),
                                ),
                                array(
                                    'data' => $realdata,
                                    'label' => 'Actual',
                                    'bars' => array('show' => true, 'barWidth' => 0.3, 'align' => 'center'),
                            
                                )
                            )
                        ;$_bl_data["data"]=$data;
 try{sys::import('modules.dynamicdata.class.properties');$property =& DataPropertyMaster::getProperty(array('type'=>"flot",'data'=>$data,'width'=>"500px",'height'=>"300px",'style'=>"display: block; margin: 0 auto;",));echo $property->showOutput(array('type'=>"flot",'data'=>$data,'width'=>"500px",'height'=>"300px",'style'=>"display: block; margin: 0 auto;",));}catch(Exception $e){}?></div><table style="margin-top: 10px; margin-bottom: 10px"><tr><td style="vertical-align: top; text-align: left; width: 150px"><?php echo xarML('
                               Description
                               ');?><br/><?php echo xarML('
                               Grade
                               ');?><br/><?php echo xarML('
                               Ideal 
                               ');?><br/><?php echo xarML('
                               Actual 
                            ');?></td><?php $binwidth=80/(count($bins)+1);$_bl_data["binwidth"]=$binwidth;
 $index=0;$_bl_data["index"]=$index;
?><td style="vertical-align: top; text-align: center; width: <?php echo $binwidth;?>%"><?php echo xarML('
                               Fail
                               ');?><br/><?php echo xarML('
                                
                               ');?><br/><?php echo xarML('
                                
                               ');?><br/><?php echo xarML(''.$bin_allocations['AWOL_Fail']['participants']);?></td><?php foreach($bins as $bin) {
     $index=$index + 1;$_bl_data["index"]=$index;
 $binname='coursebins[' . $index . ']';$_bl_data["binname"]=$binname;
 $binid='coursebins_' . $index;$_bl_data["binid"]=$binid;
?><td style="vertical-align: top; text-align: center; width: <?php echo $binwidth;?>%"><?php echo xarML(''.$bin['description']);?><br/><?php echo xarML(''.$bin['name']);?><br/><?php if(isset($ideal_allocations[$bin['name']])) {
 echo xarML(''.$ideal_allocations[$bin['name']]['participants']); } else { echo xarML('
                                        
                                    '); }
?><br/><?php if(isset($bin_allocations[$bin['name']])) {
 echo xarML(''.$bin_allocations[$bin['name']]['participants']); } else { echo xarML('
                                        
                                    '); }
?></td><?php }?></tr></table><div class="xar-row"><div class="xar-col"><!--Empty tag workaround for div tag--></div><div class="xar-col"><input type="hidden" name="authid" id="authid" value="<?php echo xarSecGenAuthKey();?>"/><input type="hidden" name="confirm" id="confirm" value="true"/><input type="hidden" name="tab" id="tab" value="<?php echo $tab;?>"/><?php $label=xarML('Cancel');$_bl_data["label"]=$label;
 echo xarTplModule('themes','user','buttontag',array('type'=>"cancel",'value'=>$label,)); echo xarML(' 
                            '); $label=xarML('Refresh');$_bl_data["label"]=$label;
 echo xarTplModule('themes','user','buttontag',array('type'=>"submit",'value'=>$label,'name'=>"refresh",)); echo xarML(' 
                            '); $label=xarML('Update');$_bl_data["label"]=$label;
 echo xarTplModule('themes','user','buttontag',array('type'=>"submit",'label'=>$label,'class'=>"btn-primary",));?></div></div></form><?php }
 }
?></div>

<?php

function nuDragSave($data){
	
	if($_SESSION['nubuilder_session_data']['IsDemo']){
		
		nuDisplayError('Not available in the Demo...');
		return;
	
	}
	
/*	
	if(!nuIsGlobeadmin()){
		
		nuDisplayError('Access to Arrange Objects is not allowed');
		
		return new stdClass;
		
	}
*/	
    foreach($data['nuDragState']['tabs'] as $tab){
		
		$tabID = $tab['tab_id'];

		for($i = 0; $i < sizeof($tab['objects']); $i++) {
			
			$field = $tab['objects'][$i];
			
            nuRunQuery("
                UPDATE zzzzsys_object SET 
                sob_all_order = ?,
                sob_all_left = ?,
                sob_all_top = ?,
                sob_all_width = ?,
                sob_all_height = ?,
				sob_all_zzzzsys_tab_id = ?
                WHERE zzzzsys_object_id = ? 
            ", array($field['tab_order'], $field['left'], $field['top'], $field['width'], $field['height'], $tabID, $field['object_id']));
			
        }
		
    }
	
    return new stdClass;
	
}

?>

<?php

 class Bricks_Fontawesome_Block_Adminhtml_Fontawesome_Grid_Renderer_FontSelected extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
    	// print_r(Mage::helper('fontawesome')->_getSelectedItem($row->getId()));exit;
        if(in_array($row->getId(),Mage::helper('fontawesome')->_getSelectedItem($row->getId())))
        {
            return '<input checked="checked" onchange="SafeItems(this)" type="checkbox" id="MA_'.$row->getId().'" name="massaction1" value="'.$row->getId().'">
            <script>
                function SafeItems(elem){
                   new Ajax.Request("'.Mage::getBaseUrl().'fontawesome/adminhtml_fontawesome/fontStatus/", {
					  	method: "Post",
			            parameters: {id:elem.value},
			            onComplete: function(transport) {
			            	$e = document.getElementById("messages");
		            	 	$e.innerHTML = \'<ul class="messages"><li class="success-msg"><ul><li><span>Item successfully updated</span></li></ul></li></ul>\'
		            	 	$e.style.opacity = 1;

	            	 		setTimeout(function() {
							   $e.innerHTML = "";
							}, 1000); // <-- time in milliseconds
		            	}
					});
                }
            </script>';
        }else
        {
            return '<input onchange="SafeItems1(this)" type="checkbox" id="'.$row->getId().'" name="massaction[]" value="'.$row->getId().'">
            <script>
                function SafeItems1(elem){
                   new Ajax.Request("'.Mage::getBaseUrl().'fontawesome/adminhtml_fontawesome/fontStatus/'.'", {
					  	method: "Post",
			            parameters: {id:elem.value},
			            onComplete: function(transport) {
			                $e = document.getElementById("messages");
		            	 	$e.innerHTML = \'<ul class="messages"><li class="success-msg"><ul><li><span>Item successfully updated</span></li></ul></li></ul>\'
		            	 	$e.style.opacity = 1;

	            	 		setTimeout(function() {
							   $e.innerHTML = "";
							}, 2000); // <-- time in milliseconds
		            	}
					});
                }
            </script>';
        }
    }
} 
<?php
class Bricks_Fontawesome_Helper_Data extends Mage_Core_Helper_Abstract
{
	public function _getSelectedItem()
	{
		 $col = Mage::getModel('fontawesome/fontawesome')->getCollection()->getData();
		 $ids = array();
		 foreach ($col as $key => $val) {
		 	if($val['font_selected'])
		 	{
		 		$ids[] =$val['id'];
		 	}
		 }
		 return $ids;
	}
	public function _getSelectedFonts()
	{
		 $col = Mage::getModel('fontawesome/fontawesome')->getCollection()->getData();
		 $ids = array();
		 foreach ($col as $key => $val) {
		 	if($val['font_selected'])
		 	{
		 		$ids[] = array(
            					'value' => $val['id'],
                				'label' => $val['font_name'],
            				);
		 	}
		 }
		 return $ids;
	}
}
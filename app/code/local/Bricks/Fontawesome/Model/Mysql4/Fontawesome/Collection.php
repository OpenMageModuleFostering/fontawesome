<?php

class Bricks_Fontawesome_Model_Mysql4_Fontawesome_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract
{
	   public function _construct()
	   {
			parent::_construct();
			$this->_init('fontawesome/fontawesome');
	   }

}

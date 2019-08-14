<?php

class Bricks_Fontawesome_Model_Fontawesome extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('fontawesome/fontawesome');
    }
    public function getSelectedFonts()
	{
		$resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $table = $resource->getTableName('fontawesome/fontawesome');

	 	//$col = Mage::getModel('fontawesome/fontawesome')->getCollection()->getData();
		
		$query = 'SELECT * FROM ' . $table.' where font_selected =1  order by font_name ASC';
	
		$results = $readConnection->fetchAll($query);

		return $results;
	}
	public function getRelatedFonts($name)
	{
		$resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $table = $resource->getTableName('fontawesome/fontawesome');
 		$query = 'SELECT * FROM ' . $table.' where font_name like '.$name." order by font_name ASC";
	
		$results[trim($val['font_name'])] = $readConnection->fetchAll($query);

		return $results;
	}
}
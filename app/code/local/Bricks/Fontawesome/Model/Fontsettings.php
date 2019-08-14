<?php

class Bricks_Fontawesome_Model_Fontsettings extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        parent::_construct();
        $this->_init('fontawesome/fontsettings', 'id');
    }
    public function getByIdFontawesome($id)
	{
		$resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $table = $resource->getTableName('fontawesome/fontsettings');
 		$query = 'SELECT * FROM ' . $table.' where id_fontawesome ='.$id;
		$row = $readConnection->fetchRow($query);
		if($row)
		{
			return $row;
		}else
		{
			return false;
		}

	}
	public function getByIconKey($key)
	{
		$resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $table = $resource->getTableName('fontawesome/fontsettings');
 		$query = 'SELECT * FROM ' . $table.' where font_seckey ="'.$key.'"';
		$row = $readConnection->fetchRow($query);
		if($row)
		{
			return $row;
		}else
		{
			return false;
		}

	}
	public function unSelectFont($fontname,$font_id)
	{
		$resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $table = $resource->getTableName('fontawesome/fontawesome');
		$word = explode('-', $fontname);
 		$str = "";
 		$op = "";
 		foreach ($word as $k => $value) {
 			if($k!=0)
 			{
 				$op=" OR ";
 			}
 			$str  .=$op.' "%'.$value.'%"';
 		}
 		$query = 'SELECT * FROM ' . $table.' where font_name like '.$str." order by font_name ASC";

		$results = $readConnection->fetchAll($query);
		foreach ($results as $key => $val) {
 			$row = $this->getByIdFontawesome($val['id']);
 			if($row)
 			{
 				$model = Mage::getModel('fontawesome/fontsettings')->load($row['id']);
 				$model->delete();
 			}
 		}
	}
	public function getAllSelected()
	{
		$resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $table_set = $resource->getTableName('fontawesome/fontsettings');
        $table = $resource->getTableName('fontawesome/fontawesome');
 		$query = 'SELECT settble.*, fonttbl.* FROM ' . $table.' fonttbl inner join '.$table_set.' settble on fonttbl.id=settble.id_fontawesome';
		$recs = $readConnection->fetchAll($query);
		if($recs)
		{
			return $recs;
		}else
		{
			return false;
		}

	}
	public function getFontFileSetting()
	{
		$resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $prefix = Mage::getConfig()->getTablePrefix();
        $table = $prefix.'font_css_setting';
 		$query = 'SELECT * FROM ' . $table;
		$row = $readConnection->fetchRow($query);
		if($row)
		{
			return $row;
		}else
		{
			return false;
		}

	}
	public function ChangeCssStatus($status,$ext_status)
	{
		$resource = Mage::getSingleton('core/resource');
        $readConnection = $resource->getConnection('core_read');
        $write = $resource->getConnection("core_write");
        $prefix = Mage::getConfig()->getTablePrefix();
        $table = $prefix.'font_css_setting';
 		$query = 'SELECT * FROM ' . $table;
		$row = $readConnection->fetchRow($query);
		if($row)
		{
			$write->update(
			    $table,
			    array('font_css_file_status' => $status,'extension_status'=>$ext_status),
			    array('id ' => $row['id'] ));

		}else
		{
			$query = "insert into ".$table
		       . "(font_css_file_status, extension_status) values "
		       . "(:font_css_file_status, :extension_status)";
	       	$binds = array(
			    'font_css_file_status'    => $status,
			    'extension_status'		=>$ext_status
			);
			$write->query($query, $binds);
		}

	}
}
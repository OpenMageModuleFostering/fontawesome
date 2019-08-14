<?php

class Bricks_Fontawesome_Block_Adminhtml_Fontsettings_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('fontsettingsGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('ASC');
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('fontawesome/fontawesome')->getCollection()->setOrder('id','DESC');
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
     $this->addColumn('id', array(
          'header'    => Mage::helper('fontawesome')->__('ID'),
          'align'     =>'right',
          'width'     => '50px',
          'index'     => 'id',
      ));

      $this->addColumn('font_name', array(
          'header'    => Mage::helper('fontawesome')->__('Icon Name'),
          'align'     =>'left',
          'index'     => 'font_name',
      ));

      $this->addColumn('font_class', array(
          'header'    => Mage::helper('fontawesome')->__('Icon Class'),
          'align'     =>'left',
          'index'     => 'font_class',
      ));

	  
      return parent::_prepareColumns();
  }

}
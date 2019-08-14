<?php

class Bricks_Fontawesome_Block_Adminhtml_Fontawesome_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
  public function __construct()
  {
      parent::__construct();
      $this->setId('fontawesomeGrid');
      $this->setDefaultSort('id');
      $this->setDefaultDir('ASC');
      $this->setSaveParametersInSession(true);
  }

  protected function _prepareCollection()
  {
      $collection = Mage::getModel('fontawesome/fontawesome')->getCollection()->setOrder('id','DESC');
      $this->setCollection($collection);
      return parent::_prepareCollection();
  }

  protected function _prepareColumns()
  {
      $this->addColumn('massactionr', array(
          'header_css_class' => 'a-center',
          'type'      => 'checkbox',
          'align'     => 'center',
          'renderer'  => new Bricks_Fontawesome_Block_Adminhtml_Fontawesome_Grid_Renderer_FontSelected,
      ));
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

      $this->addColumn('font_selected', array(
          'header'    => Mage::helper('fontawesome')->__('Status'),
          'align'     =>'left',
          'index'     => 'font_selected',
          'sortable'  => false,
          'filter'    => false,
          'renderer'  => new Bricks_Fontawesome_Block_Adminhtml_Fontawesome_Grid_Renderer_Status,
      ));
	  
      return parent::_prepareColumns();
  }

  protected function _prepareMassaction()
  {
      // $this->setMassactionIdField('id');
      // $this->getMassactionBlock()->setFormFieldName('massaction');
      // $this->getMassactionBlock()->setUseSelectAll(false);
      
      // $this->getMassactionBlock()->addItem('Save', array(
      //        'label'    => Mage::helper('catalogfilters')->__('Save'),
      //        'url'      => $this->getUrl('*/*/save'),
      //   ));

      // return $this;
  }
  protected function _prepareMassactionColumn() {
      // parent::_prepareMassactionColumn();
      // $arrayofvalues = Mage::helper('fontawesome')->_getSelectedItem();
      // $this->_columns['massaction']->setValues($arrayofvalues);
      // return $this;
  }

}
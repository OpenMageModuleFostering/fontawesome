<?php

class Bricks_Fontawesome_Block_Adminhtml_Fontsettings_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'fontawesome';
        $this->_controller = 'adminhtml_fontsettings';

        $this->_updateButton('save', 'label', Mage::helper('fontawesome')->__('Update Settings'));
        $this->_updateButton('delete', 'label', Mage::helper('fontawesome')->__('Delete Option'));

    }
    public function getHeaderText()
    {
        return Mage::helper('fontawesome')->__('Social Icons Settings');
    }
}
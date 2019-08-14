<?php

class Bricks_Fontawesome_Block_Adminhtml_Fontawesome_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        $this->_blockGroup = 'fontawesome';
        $this->_controller = 'adminhtml_fontawesome';

        $this->_updateButton('save', 'label', Mage::helper('fontawesome')->__('Save Reward'));
        $this->_updateButton('delete', 'label', Mage::helper('fontawesome')->__('Delete Option'));

    }

    public function getHeaderText()
    {
        if( Mage::registry('fontawesome_data') && Mage::registry('fontawesome_data')->getId() ) {
            return Mage::helper('fontawesome')->__("Edit Review");
        } else {
            return Mage::helper('fontawesome')->__('Add Reward');
        }

    }
}
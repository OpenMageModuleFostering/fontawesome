<?php
class Bricks_Fontawesome_Block_Adminhtml_Fontsettings extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_fontsettings';
        $this->_blockGroup = 'fontawesome';
        $this->_headerText = Mage::helper('fontawesome')->__('Social icons setting');
        parent::__construct();
    }
}
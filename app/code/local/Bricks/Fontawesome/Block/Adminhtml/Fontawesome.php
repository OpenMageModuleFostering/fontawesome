<?php
class Bricks_Fontawesome_Block_Adminhtml_Fontawesome extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_fontawesome';
        $this->_blockGroup = 'fontawesome';
        $this->_headerText = Mage::helper('fontawesome')->__('Choose Social icon from list');
        $this->_addButtonLabel = Mage::helper('fontawesome')->__('Scrape Data');
        $this->_addButton('add_new', array(
	        'label'   => Mage::helper('catalog')->__('Visit Font Awesome'),
	        'onclick' => "window.open('https://fortawesome.github.io/Font-Awesome/icons/');",
	        'class'   => 'add'
	    ));
        parent::__construct();
    }
}
<?php

class Bricks_Fontawesome_Model_Mysql4_Fontawesome extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {    
        $this->_init('fontawesome/fontawesome', 'id');
    }
    
}
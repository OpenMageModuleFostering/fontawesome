<?php

 class Bricks_Fontawesome_Block_Adminhtml_Fontawesome_Grid_Renderer_Status extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        if($row->getFontSelected()){
            return "Yes";
        }else
        {
            return "No";
        }
    }
} 
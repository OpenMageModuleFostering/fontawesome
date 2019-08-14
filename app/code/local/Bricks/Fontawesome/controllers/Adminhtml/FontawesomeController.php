<?php
include('simple_html_dom.php');
class Bricks_Fontawesome_Adminhtml_FontawesomeController extends Mage_Adminhtml_Controller_Action
{
	protected function _initAction() {
		$this->loadLayout()
			->_setActiveMenu('fontawesome/items')
			->_addBreadcrumb(Mage::helper('adminhtml')
			->__('Items Manager'), Mage::helper('adminhtml')
			->__('Item Manager'));
		
		return $this;
	}
	public function indexAction() {
        
        // $model = Mage::getModel('fontawesome/fontawesome')->getCollection();
        // if(empty($model->getData()))
        // {
        //     $this->_redirect('*/*/edit/');
        // }
        $this->_initAction()->renderLayout();
	}

	public function editAction() {
		$html = file_get_html('https://fortawesome.github.io/Font-Awesome/icons/');
		$contents = $html->find('div#icons div.fontawesome-icon-list');
		foreach($contents as $element) 
     	{
     		for($i=1; $i<count($element->children()); $i++)
     		{
     			$model = Mage::getModel('fontawesome/fontawesome');
     			$inner_content = $element->children($i);
     			$font_class = $inner_content->children(0)->children(0)->class;
     			$font_name = $inner_content->children(0)->plaintext;
     			$model->load($font_class, 'font_class');
     			if(empty($model->getData()))
 				{
	 				$model->setFontClass($font_class);
	 				$model->setFontName($font_name);
	     			$model->save();
     			}
     		}
     	}
        Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Successfully updated'));
     	$this->_redirect('*/*/');
	}
	public function newAction() {
        $this->_forward('edit');
	}
 
	public function deleteAction() {
		if( $this->getRequest()->getParam('id') > 0 ) {
			try {
				$model = Mage::getModel('fontawesome/fontawesome');
				 
				$model->setId($this->getRequest()->getParam('id'))
					->delete();
					 
				Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Item successfully deleted'));
				$this->_redirect('*/*/');
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
				$this->_redirect('*/*/edit', array('id' => $this->getRequest()->getParam('id')));
			}
		}
		$this->_redirect('*/*/');
	}

    public function massDeleteAction()
    {
        $rewardIds = $this->getRequest()->getParam('fontawesome');
        if(!is_array($rewardIds)) {
            Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select Option(s)'));
        } else {
            try {
                foreach ($rewardIds as $rewardId) {
                    $reward = Mage::getModel('fontawesome/fontawesome')->load($rewardId);
                    $reward->delete();
                }
                Mage::getSingleton('adminhtml/session')->addSuccess(
                    Mage::helper('adminhtml')->__(
                        'Total of %d record(s) were successfully deleted', count($rewardIds)
                    ));
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }
        $this->_redirect('*/*/');
    }
    public function fontStatusAction() {
    	$post = $this->getRequest()->getPost();
    	$id = $post['id'];
        $model = Mage::getModel('fontawesome/fontawesome')->load($id);
        $status = 1;
        if($model->getFontSelected())
        {
        	$status =0;
            $fonts = $model->getSelectedFonts();
            // Mage::getModel('fontawesome/fontsettings')->unSelectFont($model->getFontName(),$model->getId());
        }
        
        $model->setFontSelected($status);
        $model->save();
        echo "Status Changed successfully";
	}
}

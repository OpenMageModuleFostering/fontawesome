<?php
class Bricks_Fontawesome_Adminhtml_FontsettingsController extends Mage_Adminhtml_Controller_Action
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
        $this->_initAction()->renderLayout();
	}

	public function editAction() {
		$this->loadLayout();
	 	$this->_addBreadcrumb(Mage::helper('adminhtml')->__('Item News'), Mage::helper('adminhtml')->__('Item News'));

		$this->_addContent($this->getLayout()->createBlock('fontawesome/adminhtml_fontsettings_edit'));

		$this->renderLayout();
	}
	public function newAction() {
		$block = $this->getLayout()->createBlock('fontawesome/icons') ->setTemplate('fontawesome/index.phtml');
		$this->getResponse()->setBody($block->toHtml());
        $this->_forward('edit');
	}
	public function updateAction() {
		$post = $this->getRequest()->getPost();
		// echo "<pre>";
		// print_r($post);
		// exit;
		$model_css_settings = Mage::getModel('fontawesome/fontsettings')->ChangeCssStatus($post['font_css'],$post['extension_status']);
		foreach ($post['URL'] as $key => $value) {
			$model = Mage::getModel('fontawesome/fontsettings');
			$model_selec = Mage::getModel('fontawesome/fontsettings')->getByIconKey($post['icon_key'][$key]);
			// echo $post['selected_fonts'][$key];
			$data = array(
					'id_fontawesome'=>$post['selected_fonts'][$key],
					'font_seckey'=>$post['icon_key'][$key],
					'font_url'=>$value,
				);
			$model->setData($data);
			if($model_selec)
			{
				$model->setId($model_selec['id']);
				$model->save();
			}else
			{

            	$model->save();
            }
		}
		Mage::getSingleton('adminhtml/session')->addSuccess(Mage::helper('adminhtml')->__('Successfully updated'));
		$this->_redirect('*/*/new');
	}
}

<?php

class Bricks_Fontawesome_Block_Adminhtml_Fontawesome_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function _construct()
    {
        parent::_construct();
    }
    protected function _prepareForm()
    {
        if($this->getRequest()->getParam('id')) {
            $form = new Varien_Data_Form(array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/update', array('id' => $this->getRequest()->getParam('id'))),
                    'method' => 'post'
                )
            );
        }else
        {
            $form = new Varien_Data_Form(array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                    'method' => 'post'
                )
            );
        }
        $form->setUseContainer(true);
        $this->setForm($form);

        $coupons = Mage::getResourceModel('salesrule/rule_collection')->load();
        $reward_count[] = array(
            'value'     => '0',
            'label'     => Mage::helper('fontawesome')->__('Select'),
        );

        $ForumCollection[] = array(
            "value"    =>  0,
            "label"    =>  Mage::helper('fontawesome')->__('Select'),
        );

        if($this->getRequest()->getParam('id')){
            $fieldset = $form->addFieldset('reward id', array('legend' => 'Edit Reward'));
            $model = Mage::getModel('fontawesome/fontawesome')->load($this->getRequest()->getParam('id'));

            $data = $model->getData();

            foreach ($coupons->getData() as $item)
            {
                if($data['coupon_id']==$item['rule_id']) {

                    $ForumCollection[] = array(
                        "value" => $item['rule_id'],
                        "label" => $item['name'],
                        "selected"=>'selected',
                    );
                }else
                {
                    $ForumCollection[] = array(
                        "value" => $item['rule_id'],
                        "label" => $item['name'],
                    );
                }
            }
            for($i=1;$i<=10;$i++)
            {
                if($data['coupon_id']==$i) { //echo $data['coupon_id'];exit;
                    $reward_count[] = array(
                        'value' => $i,
                        'label' => $i,
                        "selected" => 'selected',
                    );
                }else
                {
                    $reward_count[] = array(
                        'value' => $i,
                        'label' => $i,
                    );
                }
            }

            $fieldset->addField('reward_name', 'text', array(
                'label' => 'Reward Name',
                'name' => 'reward_name',
                'required' => true,
                'value' => $data['reward_name'],
            ));
            $fieldset->addField('reward_count', 'select', array(
                'label' => 'Reward Count',
                'name' => 'reward_count',
                'required' => true,
                'values' => $reward_count,
            ));

            $fieldset->addField('coupon_id', 'select', array(
                'label'     => Mage::helper('fontawesome')->__('Choose Coupon'),
                'name'      => 'coupon_id',
                'tabindex' => 4,
                'values'    => $ForumCollection,
            ));

            $fieldset->addField('message', 'textarea', array(
                'label' => 'Message',
                'name' => 'message',
                'required' => true,
                'value' => $data['message'],
            ));
            $form->setValues(Mage::registry('fontawesome_data')->getData());
        }else
        {
            $fieldset = $form->addFieldset('new_reward', array('legend' => 'New Reward'));
            foreach ($coupons->getData() as $item)
            {
                    $ForumCollection[] = array(
                        "value" => $item['rule_id'],
                        "label" => $item['name'],
                    );
            }
            for($i=1;$i<=250;$i++)
            {
                $reward_count[] = array(
                    'value' => $i,
                    'label' => $i,
                );
            }
            $fieldset->addField('reward_name', 'text', array(
                'label' => 'Reward Name',
                'name' => 'reward_name',
                'required' => true,
                'value' => $data['reward_name'],
            ));
            $fieldset->addField('reward_count', 'select', array(
                'label' => 'Reward Count',
                'name' => 'reward_count',
                'required' => true,
                'values' => $reward_count,
            ));

            $fieldset->addField('coupon_id', 'select', array(
                'label'     => Mage::helper('fontawesome')->__('Choose Coupon'),
                'name'      => 'coupon_id',
                'values'    => $ForumCollection,
            ));

//            $fieldset->addField('coupon_id', 'select', array(
//                'label' => 'Choose Coupon',
//                'name' => 'coupon_id',
//                'required' => true,
//                'value' => $data['coupon_id'],
//            ));
            $fieldset->addField('message', 'textarea', array(
                'label' => 'Message',
                'name' => 'message',
                'required' => true,
                'value' => $data['message'],
            ));
        }


        return parent::_prepareForm();
    }
}
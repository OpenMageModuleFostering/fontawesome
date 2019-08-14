<?php

class Bricks_Fontawesome_Block_Adminhtml_Fontsettings_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    public function _construct()
    {
        parent::_construct();
    }
    protected function _prepareForm()
    {
        $form = new Varien_Data_Form(array(
                'id' => 'edit_form',
                'action' => $this->getUrl('*/*/update', array('id' => $this->getRequest()->getParam('id'))),
                'method' => 'post'
            )
        );

        $form->setUseContainer(true);
        $this->setForm($form);
        $selectedFonts =  Mage::getModel('fontawesome/fontawesome')->getSelectedFonts();
        $model_setings = Mage::getModel('fontawesome/fontsettings');
        // echo "<pre>";
        // print_r($selectedFonts);exit;
        $data = $model_setings->getFontFileSetting();
        $array = array();
        $font_css_file_status= 0;
        $extension_status = 0;
        $options= array(
                    array(
                         'value' => 0,
                         'label' => 'No',
                    ),
                    array(
                         'value' => 1,
                         'label' => 'Yes',
                    )
            );
        if(!empty($data))
        {
            $font_css_file_status = $data['font_css_file_status'];
            $extension_status = $data['extension_status'];
        }
        $fieldset = $form->addFieldset('font_settings', array('legend' => 'Settings'));
        

        $fieldset->addField('extension_status', 'select', array(
            'label' => 'Enable/Disable Extension',
            'name' => 'extension_status',
            // 'required' => true,
            'values' => $options,
            'value' =>$extension_status,
        ));


        $fieldset->addField('font_css', 'select', array(
            'label' => 'Add Font Awesome Stylesheet',
            'name' => 'font_css',
            // 'required' => true,
            'values' => $options,
            'value' =>$font_css_file_status,
        ));

        $ids = array(
                        '' => 'Select',
                    );
        foreach ($selectedFonts as $key => $value) {
            $ids[] = array(
                         'value' => $value['id'],
                         'label' => $value['font_name'],
                    );
        }
        $socialicons = array(
                        array(
                         'id' => 'facebook',
                         'font_name' => 'Facebook',
                        ),
                        array(
                         'id' => 'twitter',
                         'font_name' => 'Twitter',
                        ),
                        array(
                         'id' => 'pinterest',
                         'font_name' => 'Pinterest',
                        ),
                        array(
                         'id' => 'instagram',
                         'font_name' => 'Instagram',
                        ),
                        array(
                         'id' => 'youtube',
                         'font_name' => 'Youtube',
                        ),
                        array(
                         'id' => 'google+',
                         'font_name' => 'Google+',
                        ),
                        array(
                         'id' => 'wordpress',
                         'font_name' => 'Wordpress',
                        ),
                        array(
                         'id' => 'reddit',
                         'font_name' => 'Reddit',
                        ),
                        array(
                         'id' => 'amazon',
                         'font_name' => 'Amazon',
                        ),
                        array(
                         'id' => 'tumblr',
                         'font_name' => 'Tumblr',
                        ),
                        array(
                         'id' => 'telp',
                         'font_name' => 'Yelp',
                        ),
                        array(
                         'id' => 'vimeo',
                         'font_name' => 'Vimeo',
                        ),
                        

                );
        foreach ($socialicons as $key => $value) {
            $count = 0;
            $model_set = "";
            $font_val = '';
            $url_val = '';
            
            $model_selec = Mage::getModel('fontawesome/fontsettings')->getByIconKey($value['id']);
            if($model_selec)
            {
                $font_val = $model_selec['id_fontawesome'];
                $url_val  = $model_selec['font_url'];
            }
            $fieldset->addField('url'.$key, 'text', array(
                'label' => $value['font_name'].' URL',
                'name' => 'URL[]',
                'class'=>'validate-url',
                'value'=>$url_val,
            ));

            $fieldset->addField('icon_key'.$key, 'hidden', array(
                'name' => 'icon_key[]',
                'value'=>$value['id'],
            ));

            $fieldset->addField('attributes'.$key, 'select', array(
                // 'label' => $field_name,
                'name' => 'selected_fonts[]',
                // 'required' => true,
                'values' => $ids,
                // 'style'=>'float:left;clear:both;',
                'after_element_html' => '<div style="margin-bottom: 10px;position: relative;width: 100%;"></div>',
                'value' =>$font_val,
                'container_id'  => 'some-row-id'
            ));

        }
        return parent::_prepareForm();
    }
}
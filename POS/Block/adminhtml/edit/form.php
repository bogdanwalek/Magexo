<?php

namespace Magexo\POS\Block\Adminhtml\Edit;
 
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{

    protected $_systemStore;
 
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    
    protected function _construct()
    {
      parent::_construct();
      $this->setId('post_form');
    }
 

    protected function _prepareForm()
    {
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'),
            'method' => 'post'
            ]]
        );

        $form->setHtmlIdPrefix('post_');
 
        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Points Data'), 'class' => 'fieldset-wide']
        );
 
        $fieldset->addField(
            'name',
            'text',
            [
                'name'      => 'name',
                'label'     => __('Name'),
                'title' => __('Name'),
                'required' => true
            ]
        );
        
       $fieldset->addField(
            'address',
            'text',
            [
                'name'      => 'address',
                'label'     => __('Address'),
                'title' => __('Address'),
                'required' => true
            ]
        );
        
         
       $fieldset->addField(
            'is_available',
            'radios',
            [
                'name' => 'is_available',
                'label' => __('Is available'),
                'title' => __('Is available'),
                'required' => true,
                'values' => [
                                ['value' =>1, 'label' => __('Yes')],
                                ['value' => 0, 'label' => __('No')]
                            ]
            ]
        );
        

        $form->setUseContainer(true);

        
        $this->setForm($form);
 
        return parent::_prepareForm();
    }
}
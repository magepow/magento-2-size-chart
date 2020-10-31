<?php

namespace Magepow\SizeChart\Block\Adminhtml\SizeChart\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{


    protected $_objectManager;
    protected $_systemStore;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
         \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magepow\SizeChart\Model\Status $options,
        \Magepow\SizeChart\Model\TypeDisplay $typeDisplay,
        array $data = []
    ) {
      
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_typeDisplay = $typeDisplay;
        $this->_systemStore = $systemStore;
        $this->_objectManager = $objectManager;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    protected function _prepareForm()

    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('wkgrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Size Chart Rule'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Size Chart Rule'), 'class' => 'fieldset-wide']
            );
        }
 
       $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'id' => 'name',
                'title' => __('Name'),
                'class'=>'required_entry',
                'required' => true,
            ]
        );

        
       
         $fieldset->addField(
            'description',
            'textarea',
            [
                'name' => 'description',
                'label' => __('Description'),
                'id' => 'description',
                'title' => __('Description'),
                // 'class' => 'required_entry',
                'style'=>'height:10em',
                'required' => false,
            ]
        );
         //['tab_id' => $this->getTabId()]
        $wysiwygConfig = $this->_wysiwygConfig->getConfig();
            $fieldset->addField(
            'sizechart_info',
            'editor',
            [
                'name' => 'sizechart_info',
                'label' => __('Size Chart Information'),
                'required' => true,
                'config' => $wysiwygConfig
            ]
        );
             $fieldset->addField(
            'type_display',
            'select',
            [
                'name' => 'type_display',
                'label' => __('Type Display'),
                'id' => 'type_display',
                'title' => __('Type Display'),
                'values' => $this->_typeDisplay->getOptionArray(),
                'class' => 'status',
                'required' => true,
            ]
        );
      
        $fieldset->addField(
            'is_active',
            'select',
            [
                'name' => 'is_active',
                'label' => __('Status'),
                'id' => 'is_active',
                'title' => __('Status'),
                'values' => $this->_options->getOptionArray(),
                'class' => 'status',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'created_at',
            'date',
            [
                'name' => 'created_at',
                'label' => __('Created At'),
                'date_format' => $dateFormat,
                'time_format' => 'HH:mm:ss',
                'class' => 'validate-date validate-date-range date-range-custom_theme-from',
                'style' => 'width:200px',
                 'required'=>false,
                'disabled'=>false,


            ]
        );
        $fieldset->addField(
            'updated_at',
            'date',
            [
                'name' => 'updated_at',
                'label' => __('Updated At'),
                'date_format' => $dateFormat,
                'time_format' => 'HH:mm:ss',
                'class' => 'validate-date validate-date-range date-range-custom_theme-from',
                'style' => 'width:200px',
                'required'=>false,
                'disabled'=>false,


            ]
        );
         $fieldset->addField(
            'template_css',
            'textarea',
            [
                'name' => 'template_css',
                'label' => __('Template CSS'),
                'id' => 'template_css',
                'title' => __('Template CSS'),
                'style'=>'height:10em',
                'required' => false,
            ]
        );

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();

    }

    public function getTabLabel()
    {
        return __('General Information');
    }

 
    public function getTabTitle()
    {
        // TODO: Implement getTabTitle() method.
        return __('General Information');
    }

    /**
     * Can show tab in tabs
     *
     * @return boolean
     * @api
     */
    public function canShowTab()
    {
        // TODO: Implement canShowTab() method.
        return true;
    }

    /**
     * Tab is hidden
     *
     * @return boolean
     * @api
     */
    public function isHidden()
    {
        // TODO: Implement isHidden() method.
        return false;
    }
}
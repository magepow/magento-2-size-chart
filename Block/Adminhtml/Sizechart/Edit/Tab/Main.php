<?php

namespace Magepow\Sizechart\Block\Adminhtml\Sizechart\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Main extends Generic implements TabInterface
{


    protected $_systemStore;
    protected $_objectManager;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
         \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magepow\Sizechart\Model\Status $options,
        \Magento\Store\Model\System\Store $systemStore,
        \Magepow\Sizechart\Model\TypeDisplay $typeDisplay,
        array $data = []
    ) {

        $this->_systemStore = $systemStore;
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        $this->_typeDisplay = $typeDisplay;
        $this->_systemStore = $systemStore;
        $this->_objectManager = $context->getStoreManager();

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
            // $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']); // not use will conflict entity_id ofcondition product
            $fieldset->addField('sizechart_id', 'hidden', ['name' => 'sizechart_id']);
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

        if (!$this->_storeManager->isSingleStoreMode()) {
            $field = $fieldset->addField(
                'stores',
                'multiselect',
                [
                    'name' => 'stores[]',
                    'label' => __('Store View'),
                    'title' => __('Store View'),
                    'required' => true,
                    'values' => $this->_systemStore->getStoreValuesForForm(false, true)
                ]
            );
            $renderer = $this->getLayout()->createBlock(
                'Magento\Backend\Block\Store\Switcher\Form\Renderer\Fieldset\Element'
            );
            $field->setRenderer($renderer);
        } else {
            $fieldset->addField(
                'stores',
                'hidden',
                ['name' => 'stores[]', 'value' => $this->_storeManager->getStore(true)->getId()]
            );
            $model->setStoreId($this->_storeManager->getStore(true)->getId());
        }
       
        $fieldset->addField(
            'description',
            'textarea',
            [
                'name' => 'description',
                'label' => __('Description'),
                'id' => 'description',
                'title' => __('Description'),
                'style'=>'height:10em',
                'required' => false,
            ]
        );
         
        $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);
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
            'sort_order',
            'text',
            [
                'name' => 'sort_order',
                'label' => __('Sort Order'),
                'id' => 'sort_order',
                'title' => __('Sort Order'),
                'required' => false,
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
                'value' => 1,
                'required' => true,
            ]
        );

        $form->addValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();

    }

    public function getTabLabel()
    {
        return __('General Information');
    }

 
    public function getTabTitle()
    {
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
        return false;
    }
}
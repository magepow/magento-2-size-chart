<?php
namespace Magepow\SizeChart\Block\Adminhtml\SizeChart\Edit;
 
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    // protected $_systemStore;
 
    // public function __construct(
    //     \Magento\Backend\Block\Template\Context $context,
    //     \Magento\Framework\Registry $registry,
    //     \Magento\Framework\Data\FormFactory $formFactory,
    //     \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
    //     \Magepow\SizeChart\Model\Status $options,
    //     \Magepow\SizeChart\Model\TypeDisplay $typeDisplay,
    //     array $data = []
    // ) 
    // {
    //     $this->_options = $options;
    //     $this->_typeDisplay = $typeDisplay;
    //     $this->_wysiwygConfig = $wysiwygConfig;
    //     parent::__construct($context, $registry, $formFactory, $data);
    // }
 
    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form', 
                            'enctype' => 'multipart/form-data', 
                            'action' => $this->getData('action'), 
                            'method' => 'post'
                        ]
            ]
        );
 
        // $form->setHtmlIdPrefix('wkgrid_');
        // if ($model->getEntityId()) {
        //     $fieldset = $form->addFieldset(
        //         'base_fieldset',
        //         ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
        //     );
        //     $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        // } else {
        //     $fieldset = $form->addFieldset(
        //         'base_fieldset',
        //         ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
        //     );
        // }
 
       
        
        // $fieldset->addField(
        //     'type_display',
        //     'select',
        //     [
        //         'name' => 'type_display',
        //         'label' => __('Type Display'),
        //         'id' => 'type_display',
        //         'title' => __('Type Display'),
        //         'values' => $this->_typeDisplay->getOptionArray(),
        //         'class' => 'status',
        //         'required' => true,
        //     ]
        // );
        //  $fieldset->addField(
        //     'description',
        //     'text',
        //     [
        //         'name' => 'description',
        //         'label' => __('Description'),
        //         'id' => 'description',
        //         'title' => __('Description'),
        //         // 'class' => 'required_entry',
        //         'style'=>'height:10em',
        //         'required' => false,
        //     ]
        // );
        // $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);
        //     $fieldset->addField(
        //     'sizechart_info',
        //     'editor',
        //     [
        //         'name' => 'sizechart_info',
        //         'label' => __('Size Chart Information'),
        //         'style' => 'height:36em;',
        //         'required' => true,
        //         'config' => $wysiwygConfig
        //     ]
        // );

      
        // $fieldset->addField(
        //     'is_active',
        //     'select',
        //     [
        //         'name' => 'is_active',
        //         'label' => __('Status'),
        //         'id' => 'is_active',
        //         'title' => __('Status'),
        //         'values' => $this->_options->getOptionArray(),
        //         'class' => 'status',
        //         'required' => true,
        //     ]
        // );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
 
        return parent::_prepareForm();
    }
}
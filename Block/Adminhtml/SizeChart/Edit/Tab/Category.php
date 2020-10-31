<?php

namespace Magepow\SizeChart\Block\Adminhtml\SizeChart\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Category extends Generic implements TabInterface
{


    protected $_objectManager;
    protected $_systemStore;
    protected $_category;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        // \Magepow\SizeChart\Model\SizeChart $sizechart,
         \Magepow\SizeChart\Model\System\Config\Category $category,
        array $data = []
    ) {
      
        // $this->_sizechart = $sizechart;
        $this->_category = $category;
        $this->_systemStore = $systemStore;
        $this->_objectManager = $objectManager;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    protected function _prepareForm()

    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('wkgrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Cateogry Rule'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Category Rule'), 'class' => 'fieldset-wide']
            );
        }
        $fieldset->addType(
        'categories',
        '\Magento\Catalog\Block\Adminhtml\Product\Helper\Form\Category'
       );
 
        // $category_ids = $fieldset->addField('category_ids', 'multiselect',
        //     [
        //         'label' => __('Categories'),
        //         'title' => __('Categories'),
        //         'name'  => 'category_ids',
        //         'required' => true,
        //         'values' => $this->_category->toOptionArray(),
        //     ]
        // );
$fieldset->addField(
        'category',
        'categories',
        [
            'name' => 'category',
            'label' => __('Category'),
            'title' => __('Category')
        ]
    );
        
       

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();

    }

    public function getTabLabel()
    {
        return __('Category Information');
    }

 
    public function getTabTitle()
    {
        // TODO: Implement getTabTitle() method.
        return __('Category Information');
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
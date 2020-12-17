<?php

namespace Magepow\Sizechart\Block\Adminhtml\Sizechart\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;


class Category extends Generic implements TabInterface
{


    protected $_objectManager;
    protected $_systemStore;
    protected $_category;
    protected $_renderFieldSet;
    protected $_conditions;
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Framework\ObjectManagerInterface $objectManager,
         // \Magepow\SizeChart\Model\SizeChart $sizechart,
         \Magepow\Sizechart\Model\System\Config\Category $category,
          \Magento\Rule\Block\Conditions $conditions,
        \Magento\Backend\Block\Widget\Form\Renderer\Fieldset $rendererFieldset,
        array $data = []
    ) {
      
        // $this->_sizechart = $sizechart;
        $this->_category = $category;
        $this->_conditions = $conditions;
        $this->_renderFieldSet = $rendererFieldset;
        $this->_systemStore = $systemStore;
        $this->_objectManager = $objectManager;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    protected function _prepareForm()

    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('wkgrid_');
        // if ($model->getEntityId()) {
        //     $fieldset = $form->addFieldset(
        //         'base_fieldset',
        //         ['legend' => __('Edit Category Rule'), 'class' => 'fieldset-wide']
        //     );
        //     $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        // } else {
        //     $fieldset = $form->addFieldset(
        //         'base_fieldset',
        //         ['legend' => __('Add Category Rule'), 'class' => 'fieldset-wide']
        //     );
        // }
        $fieldsetId = 'conditions_fieldset';
        $formName = 'catalog_rule_form';

        $widgetParameters = $model->getParameters();
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $modelRule = $objectManager->get('Magento\CatalogWidget\Model\RuleFactory');
        $modelConditions = $modelRule->create();
        if (is_array($widgetParameters))
        {
            $modelConditions->loadPost($widgetParameters);
            $modelConditions->getConditions()->setJsFormObject($fieldsetId);

        }


        $newChildUrl = $this->getUrl(
            'catalog_rule/promo_catalog/newConditionHtml/form/' . $fieldsetId,
            ['form_namespace' => $fieldsetId]
        );

        $renderer = $this->_renderFieldSet->setTemplate('Magento_CatalogRule::promo/fieldset.phtml')
            ->setNewChildUrl($newChildUrl)
            ->setFieldSetId($fieldsetId);

       //  $fieldset->addType(
       //  'categories',
       //  '\Magento\Catalog\Block\Adminhtml\Product\Helper\Form\Category'
       // );
 
       //  $category = $fieldset->addField('category', 'multiselect',
       //      [
       //          'label' => __('Categories'),
       //          'title' => __('Categories'),
       //          'name'  => 'category',
       //          'required' => true,
       //          'values' => $this->_category->toOptionArray(),
       //          'note' => 'Please follow stricly this rule to make sure you size chart shows up on frontend: Level 2 -> level 3 -> level 4. For example: Women -> Tops -> Jackets.'
       //      ]
       //  );
        
// $fieldset->addField(
//         'category',
//         'categories',
//         [
//             'name' => 'category',
//             'label' => __('Category'),
//             'title' => __('Category')
//         ]
//     );
        $fieldset = $form->addFieldset(
            $fieldsetId,
            ['legend' => __('Conditions (don\'t add conditions if rule is applied to all products)')]
        )->setRenderer($renderer);

        $fieldset->addField(
            'conditions',
            'text',
            [
                'name' => 'conditions',
                'label' => __('Conditions'),
                'title' => __('Conditions'),
                'required' => false,
                'data-form-parts' => $formName
            ]
        )
            ->setRule($modelConditions)
            ->setRenderer($this->_conditions);
       

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
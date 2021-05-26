<?php

namespace Magepow\Sizechart\Block\Adminhtml\Sizechart\Edit\Tab;

use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Backend\Block\Widget\Tab\TabInterface;

class Condition extends Generic implements TabInterface
{
    protected $_renderFieldSet;
    protected $_conditions;
    protected $_ruleFactory;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Rule\Block\Conditions $conditions,
        \Magento\CatalogWidget\Model\RuleFactory $ruleFactory,
        \Magento\Backend\Block\Widget\Form\Renderer\Fieldset $rendererFieldset,
        array $data = []
    ) {
      
        $this->_conditions = $conditions;
        $this->_ruleFactory = $ruleFactory;
        $this->_renderFieldSet = $rendererFieldset;

        parent::__construct($context, $registry, $formFactory, $data);
    }
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create();
        $form->setHtmlIdPrefix('wkgrid_');
       
        $fieldsetId = 'conditions_fieldset';
        $formName = 'catalog_rule_form';

        $widgetParameters = $model->getParameters();
        $modelConditions = $this->_ruleFactory->create();

        if (is_array($widgetParameters)){
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
        )->setRule($modelConditions)->setRenderer($this->_conditions);

        $form->setValues($model->getData());
        $this->setForm($form);

        return parent::_prepareForm();

    }

    public function getTabLabel()
    {
        return __('Condition apply for products');
    }

 
    public function getTabTitle()
    {
        return __('Condition apply for products');
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
<?php

namespace Magepow\Sizechart\Block\Adminhtml\Sizechart\Edit;
use Magento\Backend\Block\Widget\Tabs as WidgetTabs;


class Tabs extends WidgetTabs
{
    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('sizechart_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(__('Size Chart Information'));
    }

    /**
     * @return $this
     */
    protected function _beforeToHtml()
    {
        $this->addTab(
            'main_section',
            [
                'label' => __('General Information'),
                'title' => __('General Information'),
                'content' => $this->getLayout()->createBlock(
                    'Magepow\Sizechart\Block\Adminhtml\Sizechart\Edit\Tab\Main'
                )->toHtml(),
            ]
        );
        $this->addTab(
            'category',
            [
                'label' => __('Condition apply for products'),
                'title' => __('Condition apply for products'),
                'content' => $this->getLayout()->createBlock(
                    'Magepow\Sizechart\Block\Adminhtml\Sizechart\Edit\Tab\Condition'
                )->toHtml(),
            ]
        );
        
        return parent::_beforeToHtml();
    }
}

<?php

namespace Magepow\SizeChart\Block\Adminhtml\SizeChart\Edit;
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
        $this->setId('sizeChart_tabs');
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
                    'Magepow\SizeChart\Block\Adminhtml\SizeChart\Edit\Tab\Main'
                )->toHtml(),
            ]
        );
        $this->addTab(
            'category',
            [
                'label' => __('Category Information'),
                'title' => __('Category Information'),
                'content' => $this->getLayout()->createBlock(
                    'Magepow\SizeChart\Block\Adminhtml\SizeChart\Edit\Tab\Category'
                )->toHtml(),
            ]
        );
        

        return parent::_beforeToHtml();
    }
}



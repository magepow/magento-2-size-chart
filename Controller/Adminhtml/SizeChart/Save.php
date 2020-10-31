<?php

namespace Magepow\SizeChart\Controller\Adminhtml\SizeChart;


class Save extends \Magento\Backend\App\Action
{

    var $childFactory;


    public function __construct(
        \Magento\Backend\App\Action\Context $context

    )
    {
        parent::__construct($context);

    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if data sent
        $data = $this->getRequest()->getPostValue();
        // print_r($data);
        // exit();
     
        if ($data) {
            $id = $this->getRequest()->getParam('entity_id');
            $model = $this->_objectManager->create('Magepow\SizeChart\Model\SizeChart')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This item no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }
            
            if (isset($data['category'])){
                $data['category'] = implode(',', $data['category']);
                // $data['category'] = $data['category_id'];         
                     
            }
       
            // if ($data['menu_type'] == 0) {
            //     $data['category_id'] = 0;
            //     $data['sub_category'] = $data['top_content'] = $data['bottom_content'] = '';
            // } else {
            //     $data['static_content'] = '';
            // }

//            if (!isset($data['stores'])) {
//                $data['stores'] = null;
//            }

            // init model and set data

            $model->setData($data);

            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                $this->messageManager->addSuccess(__('You saved the item.'));

                if ($this->getRequest()->getParam('back')) {
                    $this->_redirect('*/*/addrow', ['id' => $model->getId(), '_current' => true]);
                    return;
                }


                // go to grid
                return $resultRedirect->setPath('*/*/index');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addError($e->getMessage());
                // save data in session
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                // redirect to edit form
                return $resultRedirect->setPath('*/*/addrow', ['id' => $this->getRequest()->getParam('id')]);
            }
        }
        return $resultRedirect->setPath('*/*/index');
    }
}

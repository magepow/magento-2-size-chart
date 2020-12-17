<?php

namespace Magepow\Sizechart\Controller\Adminhtml\Sizechart;
//Magento\Backend\App\Action

class Save extends \Magento\Backend\App\Action
{
    protected $_sizechartFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magepow\Sizechart\Model\SizechartFactory $sizechartFactory

    )
    {
        parent::__construct($context);
        $this->_sizechartFactory = $sizechartFactory;

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
      //  print_r (serialize($data));
        // exit();
     
        if ($data) {
    $id = $this->getRequest()->getParam('entity_id');
    $model = $this->_sizechartFactory->create();
    $storeViewId = $this->getRequest()->getParam('store');
    $model->load($id);
    if (!$model->getId() && $id) {
     $this->messageManager->addError(__('This item no longer exists.'));
        return $resultRedirect->setPath('*/*/');
            }
            
            if (isset($data['category'])){

                $data['category'] = implode(',', $data['category']);
                // $data['category'] = $data['category_id']; 

                     
            }
               $data['conditions_serialized'] = serialize($data);
              
                // $data['type_id'] = 1;
                // print_r($data['type_id']);
              
             if(isset($data['stores'])) $data['stores'] = implode(',', $data['stores']);
             $model->setData($data)->setStoreViewId($storeViewId);;

        //     if(isset($data['rule'])){
        // $dataArray['conditions'] = $this->serialize($data['rule']['conditions']);
        //     }
    // if(array_key_exists('conditions_serialized',$data))$data['conditions_serialized']=implode(',',$data['conditions_serialized']);
            
              // $data['conditions_serialized'] = 'a:1:{s:10:"conditions";'.serialize($data['parameters']['conditions']).'}';
                 // print_r( $data['conditions_serialized']);
 
                // if (array_key_exists('conditions_serialized', $data)) {
                  // print_r($data['conditions_serialized']);
                  // exit();

            // init model and set data

            


            // try to save it
            try {
                // $model->loadPost($model->getData());
                // save the data
                $model->save();
                // display success message
                $this->messageManager->addSuccess(__('You saved the item.'));
                // $this->_getSession()->setFormData(false);


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
    // protected function prepareData($data)
    // {
       
    //     $data['conditions_serialized'] = 'a:1:{s:10:"conditions";'.serialize($data['parameters']['conditions_serialized']).'}';
    //     $data['display_item'] = 'a:1:{s:10:"conditions";'.serialize($data['parameters']['conditions_item']).'}';
    //     return $data;
    // }
}

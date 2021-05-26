<?php

namespace Magepow\Sizechart\Controller\Adminhtml\Sizechart;
class Save extends \Magento\Backend\App\Action
{
    protected $_sizechartFactory;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magepow\Sizechart\Model\SizechartFactory $sizechartFactory

    ) {
        parent::__construct($context);
        $this->_sizechartFactory = $sizechartFactory;
    }
    public function serialize($data)
    {

        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $serializer = $objectManager->create(\Magento\Framework\Serialize\SerializerInterface::class);
        return $serializer->serialize($data);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if data sent
        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $id = $this->getRequest()->getParam('sizechart_id');
            if($id) $data['entity_id'] = $id; // fix conflict entity_id in product condition
            $model = $this->_sizechartFactory->create();
            $storeViewId = $this->getRequest()->getParam('stores');
            $model->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addError(__('This item no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            if (isset($data['category'])) {
                $data['category'] = implode(',', $data['category']);
            }

            $data['conditions_serialized'] = $this->serialize(['parameters' => $data['parameters']]);

            if (isset($data['stores'])) $data['stores'] = implode(',', $data['stores']);
            $model->setData($data)->setStoreViewId($storeViewId);;

            // try to save it
            try {

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

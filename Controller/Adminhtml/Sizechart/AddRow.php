<?php


namespace Magepow\Sizechart\Controller\Adminhtml\Sizechart;

use Magento\Framework\Controller\ResultFactory;

class AddRow extends \Magento\Backend\App\Action
{
       private $coreRegistry;
    private $sizechartFactory;
    protected $json;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry,
        \Magepow\Sizechart\Model\SizechartFactory $sizechartFactory,
        \Magepow\Sizechart\Serialize\Serializer\Json $json
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->sizechartFactory = $sizechartFactory;
        $this->json = $json;
    }
//   public function unserialize($data)
//  {
    
//         $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
//         $serializer = $objectManager->create(\Magento\Framework\Serialize\Serializer\Json::class);
//         return $serializer->unserialize($data);
    
     
// }
    public function execute()
    {
        $rowId = (int) $this->getRequest()->getParam('id');
        $storeViewId = $this->getRequest()->getParam('stores');
        $rowData = $this->sizechartFactory->create();

        if ($rowId) {
            // $rowData->setStoreViewId($storeViewId)->load($rowId);
            $rowData = $rowData->setStoreViewId($storeViewId)->load($rowId);

            $rowTitle = $rowData->getTitle();
            if (!$rowData->getEntityId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('magepow_sizechart/sizechart/rowdata');

                return ;
             }
             else{
                $tmp = $this->json->unserialize($rowData->getConditionsSerialized());
                if(is_array($tmp)){
                    unset($tmp['form_key']);
                    unset($tmp['entity_id']);
                    $rowData->addData($tmp);
                }
            }
        }

        $this->coreRegistry->register('row_data', $rowData);
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);
        $title = $rowId ? __('Edit sizechart ').$rowTitle : __('Add sizechart');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }


}
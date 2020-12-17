<?php

namespace Magepow\Sizechart\Controller\Adminhtml;

abstract class Action extends \Magento\Backend\App\Action{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry = null;
 
    /**
     * @var \Magento\Framework\App\Response\Http\FileFactory
     */
    protected $fileFactory;
 
    /**
     * @var \Magento\Framework\Stdlib\DateTime\Filter\Date
     */
    protected $dateFilter;
 
    
    protected $_sizechartFactory;
 
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;
 
    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Framework\App\Response\Http\FileFactory $fileFactory
     * @param \Magento\Framework\Stdlib\DateTime\Filter\Date $dateFilter
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Framework\App\Response\Http\FileFactory $fileFactory,
        \Magento\Framework\Stdlib\DateTime\Filter\Date $dateFilter,
        \Magepow\Sizechart\Model\sizechartFactory $sizechartFactory,
        \Psr\Log\LoggerInterface $logger
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->fileFactory = $fileFactory;
        $this->dateFilter = $dateFilter;
        $this->_sizechartFactory = $sizechartFactory;
        $this->logger = $logger;
    }
 
    /**
     * Initiate rule
     *
     * @return void
     */
    protected function _initRule()
    {
        $rule = $this->_sizechartFactory->create();
        $id = (int)$this->getRequest()->getParam('id');
 
        if (!$id && $this->getRequest()->getParam('entity_id')) {
            $id = (int)$this->getRequest()->getParam('entity_id');
        }
 
    }
 
   
    protected function _initAction()
    {
        $this->_view->loadLayout();
        $this->_setActiveMenu('Magepow_Sizechart::magepow_sizechart')
            ->_addBreadcrumb(__('Magepow Sizechart'), __('Magepow Sizechart'));
        return $this;
    }
 
    /**
     * Returns result of current user permission check on resource and privilege
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Magepow_Sizechart::sizechart');
    }
}
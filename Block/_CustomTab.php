<?php
namespace Magepow\Sizechart\Block;
class CustomTab extends \Magento\Framework\View\Element\Template
{
	protected $_sizechartFactory;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Magepow\Sizechart\Model\SizechartFactory $sizechartFactory,
		 \Magento\Store\Model\StoreManagerInterface $storeManager,
        array $data = []
	)
	{
		$this->_sizechartFactory = $sizechartFactory;
		$this->storeManager = $storeManager;
		 
		parent::__construct($context);
	}
	// public function getCacheLifetime()
 //    {
 //        return null;
 //    }
	public function getCustomTabCollection(){
	
		$collection = $this->_sizechartFactory->create();
		$sizechart = $collection->getCollection()->addFieldToFilter('is_active',1);
 		 return $sizechart;
}
 public function getCategory($categoryId)
    {
        $this->category = $this->_categoryFactory->create();
        $this->category->load($categoryId);
        return $this->category;
    }
    
    
     public function getCurrentCategory()
    {        
        return $this->_registry->registry('current_category');
    }
     public function getCurrentProduct()
    {        
        return $this->_registry->registry('current_product');
    }    
}
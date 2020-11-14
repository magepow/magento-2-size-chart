<?php
namespace Magepow\Sizechart\Block;
use Magento\Catalog\Model\CategoryFactory;

class Sizechart extends \Magento\Framework\View\Element\Template
{
    
	protected $_sizechartFactory;
	protected $_registry;
	protected $_categoryFactory;
	protected $category;

	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Magepow\Sizechart\Model\SizechartFactory $sizechartFactory,
		 \Magento\Store\Model\StoreManagerInterface $storeManager,
		 \Magento\Framework\Registry $registry,
		 CategoryFactory $categoryFactory,
        array $data = []
	)
	{
      
		$this->_registry = $registry;
		$this->_categoryFactory = $categoryFactory;
		$this->_sizechartFactory = $sizechartFactory;
		$this->storeManager = $storeManager;
		 
		parent::__construct($context);
	}

	public function getSizeChartCollection(){
	
		$collection = $this->_sizechartFactory->create();
		$sizechart = $collection->getCollection()->addFieldToFilter('is_active',1);
 		 return $sizechart;
}

public function getClass($item){
	$type = $item->getTypeDisplay();
	if($type == 1){
	return 'sizechart-inline';
	}elseif($type == 2){
	return 'sizechart-popup';
	}else{
		return 'sizechart-custom';
	}
	
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

  public function getMedia($img=null)
    {
        $urlMedia = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        if($img) return $urlMedia . "magepow/sizechart/" . $img;
        return $urlMedia;
    }
	
}
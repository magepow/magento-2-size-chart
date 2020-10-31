<?php
namespace Magepow\SizeChart\Block;
class SizeChart extends \Magento\Framework\View\Element\Template
{
	protected $_sizechartFactory;
	// protected $_cacheTypeList;
	// protected $_cacheFrontendPool;
	public function __construct(\Magento\Framework\View\Element\Template\Context $context,
		\Magepow\SizeChart\Model\SizeChartFactory $sizechartFactory,
		 \Magento\Store\Model\StoreManagerInterface $storeManager,
		  \Magento\Framework\App\Cache\TypeListInterface $cacheTypeList,
    \Magento\Framework\App\Cache\Frontend\Pool $cacheFrontendPool,
        array $data = []
	)
	{
		$this->_sizechartFactory = $sizechartFactory;
		$this->storeManager = $storeManager;
		 $this->_cacheTypeList = $cacheTypeList;
    $this->_cacheFrontendPool = $cacheFrontendPool;
		parent::__construct($context);
	}

	public function getSizeChartCollection(){
	
		$collection = $this->_sizechartFactory->create();
		$sizechart =  $collection->getCollection()->addFieldToFilter('is_active',1);
		return $sizechart;
		
	}
// public function flushCache()
// {
//   $_types = [
//             'config',
//             'layout',
//             'block_html',
//             'collections',
//             'reflection',
//             'db_ddl',
//             'eav',
//             'config_integration',
//             'config_integration_api',
//             'full_page',
//             'translate',
//             'config_webservice'
//             ];
 
//     foreach ($_types as $type) {
//         $this->cacheTypeList->cleanType($type);
//     }
//     foreach ($this->cacheFrontendPool as $cacheFrontend) {
//         $cacheFrontend->getBackend()->clean();
//     }
// }
	
	public function sayHello()
	{
		return __('Hello World');
	}

  public function getMedia($img=null)
    {
        $urlMedia = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        if($img) return $urlMedia . $img;
        return $urlMedia;
    }
	
}
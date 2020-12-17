<?php
namespace Magepow\Sizechart\Block;
class SizeChart extends \Magento\Framework\View\Element\Template

{ 
    protected $_productCollectionFactory;

    protected $_productVisibility;
    protected $_sizechartFactory;
    protected $_parameters;
    protected $_ruleFactory;
    protected $_stockConfig;
    protected $sqlBuilder;
    protected $_stockFilter;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context, 
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
         \Magento\CatalogWidget\Model\RuleFactory $ruleFactory,
         \Magento\CatalogInventory\Helper\Stock $stockFilter,
        \Magento\CatalogInventory\Model\Configuration $stockConfig,
         \Magento\Rule\Model\Condition\Sql\Builder $sqlBuilder,
        \Magento\Catalog\Model\Product\Visibility $productVisibility,
         \Magepow\Sizechart\Model\SizechartFactory $sizechartFactory,
        array $data = []
    ) {
        $this->_productCollectionFactory = $productCollectionFactory; 
        $this->_productVisibility = $productVisibility; 
        $this->_sizechartFactory = $sizechartFactory;
        $this->_ruleFactory = $ruleFactory;
        $this->sqlBuilder   = $sqlBuilder;
         $this->_stockFilter = $stockFilter;
        $this->_stockConfig = $stockConfig;
        parent::__construct($context, $data);
    }

    public function getProductCollection() {
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');

        // filter current website products
        $collection->addWebsiteFilter();

        $collection->addAttributeToSort('entity_id','desc');

        // filter current store products
        $collection->addStoreFilter();

        // set visibility filter
        $collection->setVisibility($this->_productVisibility->getVisibleInSiteIds());

        // fetching only 5 products

        return $collection;
    }
     public function getWidgetCfg($cfg=null)
    {
    $collection = $this->_sizechartFactory->create();
     $sizechart = $collection->getCollection()->addFieldToFilter('is_active',1);
    foreach ($sizechart as $value) {

    	$config = $value->getConditionsSerialized();
    	$data = @unserialize($config);
    	$this->_parameters = $data['parameters'];
    	return ($this->_parameters);	

    }

        
    }
    protected function getRule($conditions)
    {
        $rule = $this->_ruleFactory->create();
        if(is_array($conditions)) $rule->loadPost($conditions);
        return $rule; 
    }
    public function getLoadedProductCollection()
    {
        $this->_limit = (int) $this->getWidgetCfg();
        // $type = $this->getTypeFilter();
        // $fn = 'get' . ucfirst($type) . 'Products';
        $collection = $this->getLatestProducts();
        $parameters = $this->_parameters;
        if($parameters){
            $rule = $this->getRule($parameters);
            $conditions = $rule->getConditions();
            $conditions->collectValidatedAttributes($collection);
            $this->sqlBuilder->attachConditionToCollection($collection, $conditions);
        }
        if ($this->_stockConfig->isShowOutOfStock() != 1) {
            $this->_stockFilter->addInStockFilterToCollection($collection);
        }
        $this->_eventManager->dispatch(
            'catalog_block_product_list_collection',
            ['collection' => $collection]
        );
        $page = $this->getRequest()->getPost('p', 1);
        return $collection->setCurPage($page);
     
    }

}
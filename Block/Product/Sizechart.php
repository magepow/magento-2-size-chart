<?php
namespace Magepow\Sizechart\Block\Product;
 
class Sizechart extends \Magento\Catalog\Block\Product\AbstractProduct
{

    protected $sqlBuilder;

    protected $_productRepository;

    protected $_registry;
    /**
     * @var \Magento\Framework\Url\Helper\Data
     */
    protected $urlHelper;

    /**
     *
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_objectManager;

    /**
     * Catalog product visibility
     *
     * @var \Magento\Catalog\Model\Product\Visibility
     */
    protected $_catalogProductVisibility;

    /**
     * @var _stockconfig
     */
    protected $_stockConfig;

     /**
     * @var \Magento\CatalogInventory\Helper\Stock
     */
    protected $_stockFilter;

    /**
     * Product collection factory
     *
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

    /**
     * @var CategoryRepositoryInterface
     */
    protected $categoryRepository;

    /**
     * Product collection factory
     *
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_ruleFactory;

    /**
     * Product collection factory
     *
     * @var \Magiccart\Magicproduct\Model\Magicproduct
     */
    protected $_sizechartFactory;

    protected $_limit; // Limit Product

    protected $_parameters; // Condition Product
    protected $_request;
    protected $_abstractProduct;
   
    /**
     * @param Context $context
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\AbstractProduct $abstractProduct,
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\Framework\Url\Helper\Data $urlHelper,
        \Magento\Framework\ObjectManagerInterface $objectManager,
         \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility,
        \Magento\CatalogInventory\Helper\Stock $stockFilter,
        \Magento\CatalogInventory\Model\Configuration $stockConfig,
        \Magento\CatalogWidget\Model\RuleFactory $ruleFactory,
        \Magento\Rule\Model\Condition\Sql\Builder $sqlBuilder,
          \Magepow\Sizechart\Model\SizechartFactory $sizechartFactory,
        array $data = []
    ) {
         $this->storeManager = $storeManager;
        $this->_abstractProduct = $abstractProduct;
        $this->urlHelper = $urlHelper;
        $this->_objectManager = $objectManager;
        $this->categoryRepository = $categoryRepository;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->_catalogProductVisibility = $catalogProductVisibility;
        $this->_stockFilter = $stockFilter;
        $this->_stockConfig = $stockConfig;
        $this->_ruleFactory = $ruleFactory;
        $this->sqlBuilder   = $sqlBuilder;
        $this->_sizechartFactory = $sizechartFactory;
        parent::__construct( $context, $data );
        
    }
    protected function _construct()
    {
        parent::_construct();
        $this->addData([
            'cache_lifetime' => false,
            'cache_tags' => [\Magento\Catalog\Model\Product::CACHE_TAG,
            ], ]);
    }

   public function getConfig(){
                $currentProductAttribute = $this->getCurrentProduct()->getSizechartManagement();
                $item = $this->_sizechartFactory->create();
if ($currentProductAttribute == '') {
                      $collection = $item->getCollection()->addFieldToSelect('conditions_serialized')
                                ->addFieldToFilter('is_active', 1);
                                foreach ($collection as $value) {
                                  $config = $value ->getConditionsSerialized();
                                   $data = @unserialize($config);
                                   
                                }
                                $this->_parameters =  $data['parameters'];
                }else{
                $collection = $item->getCollection()->addFieldToSelect('conditions_serialized')->addFieldToFilter('entity_id',$currentProductAttribute)
                                ->addFieldToFilter('is_active', 1);
                                foreach ($collection as $value) {
                                  $config = $value ->getConditionsSerialized();
                                   $data = @unserialize($config);
                                   
                                }
                                $this->_parameters =  $data['parameters'];
                
               }
              
            return $data;
 }
 public function getClass($typeDisplay){
  if($typeDisplay == 1){
  return 'sizechart-inline';
  }elseif($typeDisplay == 2){
 return 'sizechart-popup';
  }
  
}

   

  public function array_replace_key($search, $replace, array $subject) {
    $updatedArray = [];

    foreach ($subject as $key => $value) {
        if (!is_array($value) && $key == $search) {
            $updatedArray = array_merge($updatedArray, [$replace => $value]);
            
            continue;
        }

        $updatedArray = array_merge($updatedArray, [$key => $value]);
    }

    return $updatedArray;
}
    public function getLoadedProductCollection()
    {
        $this->_limit = (int) $this->getSizeChartCollection();
        // $type = $this->getTypeFilter();
        // $fn = 'get' . ucfirst($type) . 'Products';
        $collection = $this->getProducts();
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


    protected function getRule($conditions)
    {
        $rule = $this->_ruleFactory->create();
        if(is_array($conditions)) $rule->loadPost($conditions);
        return $rule; 
    }
    public function getCurrentProduct(){
        $product = $this->_abstractProduct->getProduct();
        return $product;
    }

    public function getProducts(){
     
        $collection = $this->_productCollectionFactory->create();
        $collection->setVisibility($this->_catalogProductVisibility->getVisibleInCatalogIds());
        $collection = $this->_addProductAttributesAndPrices(
            $collection
        )->addStoreFilter()
        ->addAttributeToSort('entity_id', 'desc');
        return $collection;
      
    }
     public function getMedia($img=null)
    {
        $urlMedia = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        if($img) return $urlMedia . "magepow/sizechart/" . $img;
        return $urlMedia;
    }  

}
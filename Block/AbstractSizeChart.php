<?php
namespace Magepow\SizeChart\Block;
use Magento\Catalog\Model\Category;
use Magento\Customer\Model\Context;
abstract class AbstractSizeChart extends \Magento\Framework\View\Element\Template implements \Magento\Framework\DataObject\IdentityInterface
{
	 /**
     * @var Category
     */
    protected $_categoryInstance;

    /**
     * Current category key
     *
     * @var string
     */
    protected $_currentCategoryKey;

    /**
     * Array of level position counters
     *
     * @var array
     */
    protected $_itemLevelPositions = [];

    /**
     * Catalog category
     *
     * @var \Magento\Catalog\Helper\Category
     */
    protected $_catalogCategory;

    /**
     * @var \Magento\Framework\Registry
     */
    protected $_registry;

    /**
     * Customer session
     *
     * @var \Magento\Framework\App\Http\Context
     */
    protected $httpContext;

    /**
     * Catalog layer
     *
     * @var \Magento\Catalog\Model\Layer
     */
    protected $_catalogLayer;

    /**
     * Product collection factory
     *
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_productCollectionFactory;

    /**
     * @var \Magento\Catalog\Model\Indexer\Category\Flat\State
     */
    protected $flatState;

    /**
     * @var \Magento\Framework\ObjectManagerInterface
     */
    protected $_objectManager;

    protected $_urlinterface;

    /**
     * @var \Magento\Cms\Model\Template\FilterProvider
     */
    protected $_filterProvider;
	
	function __construct(
		  \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\Layer\Resolver $layerResolver,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Catalog\Helper\Category $catalogCategory,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\Indexer\Category\Flat\State $flatState,
        \Magento\Framework\ObjectManagerInterface $objectManager,
        \Magento\Cms\Model\Template\FilterProvider $filterProvider,
        array $data = []
	)
	{
		$this->_productCollectionFactory = $productCollectionFactory;
        $this->_catalogLayer = $layerResolver->get();
        $this->httpContext = $httpContext;
        $this->_catalogCategory = $catalogCategory;
        $this->_registry = $registry;
        $this->flatState = $flatState;
        $this->_categoryInstance = $categoryFactory->create();
        $this->_objectManager = $objectManager;
        $this->_urlinterface = $context->getUrlBuilder();
        $this->_filterProvider = $filterProvider;
        parent::__construct($context, $data);
	}
	public function getClass($item){
		$type = $item->getTypeDisplay();
        if ($type == 1) {
            return $this->getInline($item);
        } else {
            return $this->getPopUp($item);
        }
	}
	public function getInline($item){
		$html .= '<div class="sizechart-info">';
		$html .='<span class="sizechart-description">' .$item->getDescription().'</span>';
		$html .='<div class="sizechart-infotable">' .$item->getSizechartInfo() .'</div>';
		$html .='</div>';
	}
	public function getPopUp($item){
		$html .= '<div class="sizechart-info">';
		$html .='<span class="sizechart-description">' .$item->getName().'</span>';
		$html .='<div class="sizechart-infotable">' .$item->getSizechartInfo() .'</div>';
		$html .='</div>';
	}

}
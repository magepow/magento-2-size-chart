<?php

namespace Magepow\Sizechart\Block\Product;

class Sizechart extends \Magento\Catalog\Block\Product\AbstractProduct
{

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
    protected $json;
    protected $_filter;

    /**
     * @param Context $context
     * @param \Magento\Framework\ObjectManagerInterface $objectManager
     * @param \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory
     * @param \Magento\Catalog\Model\Product\Visibility $catalogProductVisibility
     * @param array $data
     */
    public function __construct(
        \Magento\Catalog\Block\Product\Context $context,
        \Magento\CatalogWidget\Model\RuleFactory $ruleFactory,
        \Magepow\Sizechart\Model\SizechartFactory $sizechartFactory,
        \Magepow\Sizechart\Serialize\Serializer\Json $json,
        \Magento\Cms\Model\Template\FilterProvider $filter,
        array $data = []
    ) {
        $this->_ruleFactory = $ruleFactory;
        $this->_filter = $filter;
        $this->json = $json;
        $this->_sizechartFactory = $sizechartFactory;
        parent::__construct($context, $data);
    }

    public function getSizeChartCollection()
    {
        $store = $this->_storeManager->getStore()->getStoreId();;

        $collection = $this->_sizechartFactory->create()->getCollection()
                        ->addFieldToSelect('*')
                        ->addFieldToFilter('is_active', 1)
                        ->addFieldToFilter('stores', array(array('finset' => 0), array('finset' => $store)))
                        ->setOrder('sort_order', 'ASC');

        return $collection;
    }

    public function getSizeChart()
    {
        if(!$this->hasData('size_chart')) {

            $collection = $this->getSizeChartCollection();
            $product    = $this->getProduct();
            $sizeChart  = '';
            foreach ($collection as $item) {
                $config = $item->getConditionsSerialized();
                $data = $this->json->unserialize($config);
                $parameters =  $data['parameters'];
                $rule = $this->getRule($parameters);
                $validate = $rule->getConditions()->validate($product);
                if($validate){
                    $sizeChart = $item;
                    break;
                }
            }

            $this->setData('size_chart', $sizeChart);
        }

        return $this->getData('size_chart');
    }

    public function getContentFromStaticBlock($content)
    {
        return $this->_filter->getBlockFilter()->filter($content);
    }

    public function getClass($typeDisplay)
    {
        $type = 'sizechart-customtab';
        if ($typeDisplay == 1) {
            $type = 'sizechart-inline';
        } elseif ($typeDisplay == 2) {
            $type = 'sizechart-popup';
        } 

        return $type;
    }

    protected function getRule($conditions)
    {
        $rule = $this->_ruleFactory->create();
        if (is_array($conditions)) $rule->loadPost($conditions);
        return $rule;
    }


    public function getMedia($img = null)
    {
        $urlMedia = $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        if ($img) return $urlMedia . "magepow/sizechart/" . $img;
        return $urlMedia;
    }
}

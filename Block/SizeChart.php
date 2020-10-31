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
        array $data = []
	)
	{
		$this->_sizechartFactory = $sizechartFactory;
		$this->storeManager = $storeManager;
		 
		parent::__construct($context);
	}

	public function getSizeChartCollection(){
	
		$collection = $this->_sizechartFactory->create();
		$sizechart = $collection->getCollection()->addFieldToFilter('is_active',1);
 		

		  foreach ($sizechart as $item) {
			// if($item->getTypeDisplay() == 1){
			// 	return $this->getInline($item);
			// }elseif($item->getTypeDisplay() == 2){
			// 	return $this->getPopUp($item);
			// }else{
			// 	echo "ijefiojeg";
			// }
			return $this->getTypeDisplayHtml($item);

 	
	}
	//return $sizechart;

}
	
	 //return parent::getSizeChartCollection();
	


public function getTypeDisplayHtml($item){
	if($item->getTypeDisplay() == 1){
			return($this->getPopUp($item));
			}elseif($item->getTypeDisplay() == 2){
				return $this->getInline($item);
			}else{
				return $this->getCustomTab($item);
			}
			// }else{
			// 	var_dump($this->getCustomTab($item));
			// }

}
public function getClass($item){
	$type = $item->getTypeDisplay();
	if($type == 1){
		$class .= "inline";
	}elseif($type == 2){
		$class .= "popup";
	}
}

	public function getInline($item){
		// $class .= "sizechart-info";

		 return $item->getDescription();
		// $html .= '';
		// $html .='<div class="size-chart-main-name inline">';
		// $html .= '<h4>';
		// $html .= $item->getName();
		// $html .= '</h4>';
		// $html .= '</div>';
		// $html .='<div class = "size-chart-main-text inline">';
		// $html .= '<span class="sizechart-description">';
		// $html .= $item->getDescription();
		// $html .= '</span>';
		// $html .='</div>';
		// $html .= '<div class="size-chart-main-info inline">';
		// $html .= $item->getSizechartInfo();
		// $html .= '</div>';
		


		 // $item->getTypeDisplay() = "inline";
		 // $inline =  $item->getTypeDisplay();
		// foreach ($sizechart as $item) {
		// 	# code...
		// 	 $html .= "<p class='description'>" . $item->getDescription() ."</p>";
		//  echo $html;
		echo $html;
		}
		

	//}
	public function getPopUp($item) {
		$html .= '';
		$html .='<div class="size-chart-main-name inline">';
		$html .= '<h4>';
		$html .= $item->getName();
		$html .= '</h4>';
		$html .= '</div>';
		return $html;

		// return $item->getDescription();
		// $html .= '';
		// $html .='<div class="size-chart-main-name popup">';
		//$html .= '<h4>'.$item->getName().'</h4>';
		// $html .= '</div>';
		// $html .='<div class = "size-chart-main-text popup">';
		// $html .= '<p>'.$item->getDescription().'</p>';
		// $html .='</div>';
		// $html .= '<div class="size-chart-main-info popup">';
		// $html .= $item->getSizechartInfo();
		// $html .= '</div>';
		
			
		// $item->getTypeDisplay() = "popup";
		//  $inline =  $item->getTypeDisplay();
		 
		 	//var_dump($item->getDescription());
		// 	# code...
		// 	 $html .= "<p class='description'>" . $item->getDescription() ."</p>";
		//  echo $html;
		// var_dump("ewngioitjoie");
	
}
public function getCustomTab($item){
	return $item->getDescription();
}
//}
	
	// public function getHtmlClass()
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
		return __('Hello World1111111222');
	}

  public function getMedia($img=null)
    {
        $urlMedia = $this->storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        if($img) return $urlMedia . $img;
        return $urlMedia;
    }
	
}
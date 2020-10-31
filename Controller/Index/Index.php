<?php
namespace Magepow\SizeChart\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_sizechartFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magepow\SizeChart\Model\SizeChartFactory $sizechartFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_sizechartFactory = $sizechartFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$sizechart = $this->_sizechartFactory->create();
		$sizechart->getCollection();
		$collection = $sizechart->getCollection();
		foreach($collection as $item){
			 echo "<div class='abc'>";
			print_r ($item->getData());
			echo "</div>";
		}
		// exit();
		 // return $this->_pageFactory->create();
	}
}
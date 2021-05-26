<?php
namespace Magepow\Sizechart\Controller\Index;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	protected $_sizechartFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory,
		\Magepow\Sizechart\Model\SizechartFactory $sizechartFactory
		)
	{
		$this->_pageFactory = $pageFactory;
		$this->_sizechartFactory = $sizechartFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		$page = $this->_pageFactory->create();
		$pageFactory = $page->getLayout()->getBlock('Magepow\Sizechart\Block\Product\Sizechart');
        //We are using HTTP headers to control various page caches (varnish, fastly, built-in php cache)
        $pageFactory->setHeader('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0', true);

        return $pageFactory;
	}

}

<?php
namespace Magepow\SizeChart\Model\ResourceModel;


class SizeChart extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
	
	public function __construct(
		\Magento\Framework\Model\ResourceModel\Db\Context $context
	)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('sizechart_management', 'entity_id');
	}
	
}
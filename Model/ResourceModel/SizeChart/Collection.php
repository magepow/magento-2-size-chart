<?php
namespace Magepow\SizeChart\Model\ResourceModel\SizeChart;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'entity_id';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
	$this->_init('Magepow\SizeChart\Model\SizeChart',
		'Magepow\SizeChart\Model\ResourceModel\SizeChart');
	}

}

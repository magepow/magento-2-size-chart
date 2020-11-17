<?php
namespace Magepow\Sizechart\Model\ResourceModel\Sizechart;

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
	$this->_init('Magepow\Sizechart\Model\Sizechart',
		'Magepow\Sizechart\Model\ResourceModel\Sizechart');
	}

}

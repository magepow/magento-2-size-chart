<?php
namespace Magepow\SizeChart\Model;
 use Magepow\SizeChart\Api\Data\SizeChartInterface;
class SizeChart extends \Magento\Framework\Model\AbstractModel implements SizeChartInterface
{
	const CACHE_TAG = 'sizechart_management';

	protected $_cacheTag = 'sizechart_management';

	protected $_eventPrefix = 'sizechart_management';

	protected function _construct()
	{
		$this->_init('Magepow\SizeChart\Model\ResourceModel\SizeChart');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
	 public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }
    public function setEntityId($entityId){
    	return $this->setData(self::ENTITY_ID,$entityId);
    }
    public function getCategoryId(){
    	return $this->getData(self::CATEGORY_ID);
    }
       public function setCategoryId($categoryId){
    	return $this->setData(self::CATEGORY_ID,$categoryId);
    }
    public function getSubCategoryId(){
    	return $this->getData(self::SUB_CATEGORY_ID);
    }
    public function setSubCategoryId($subCategoryId){
    	return $this->setData(self::SUB_CATEGORY_ID,$subCategoryId);
    }
    public function getTypeDisplay(){
    	return $this->getData(self::TYPE_DISPLAY);
    }
    public function setTypeDisplay($typeDisplay){
    	return $this->setData(self::TYPE_DISPLAY, $typeDisplay);
    }
    public function getDescription(){
    	return $this->getData(self::DESCRIPTION);
    }
    public function setDescription($description){
    	return $this->setData(self::DESCRIPTION,$description);
    }
    public function getSizeChartInfo(){
    	return $this->getData(self::SIZECHART_INFO);
    }
    public function setSizeChartInfo($sizeChartInfo){
    	return $this->setData(self::SIZECHART_INFO,$sizeChartInfo);
    }
    public function getUpdatedAt(){
    	return $this->getData(self::UPDATED_AT);
    }
    public function setUpdatedAt($updatedAt){
    	return $this->setData(self::UPDATED_AT, $updatedAt);
    }
    public function getCreatedAt(){
    	return $this->getData(self::CREATED_AT);
    }
    public function setCreatedAt($createdAt){
    	return $this->setData(self::CREATED_AT,$createdAt);
    }
    public function getIsActive(){
        return $this->getData(self::IS_ACTIVE);
    }
    public function setIsActive($isActive){
        return $this->setData(self::IS_ACTIVE,$isActive);
    }
}
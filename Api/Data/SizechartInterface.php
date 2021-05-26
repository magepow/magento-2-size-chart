<?php

namespace Magepow\Sizechart\Api\Data;

interface SizechartInterface
{
    const ENTITY_ID = 'entity_id';
    const CATEGORY_ID = 'category_id';
    const SUB_CATEGORY_ID = 'sub_category_id';
    const TYPE_DISPLAY = 'type_display';
    const IS_ACTIVE = 'is_active';
    const DESCRIPTION = 'description';
    const SIZECHART_INFO = 'sizechart_info';
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';
    const TEMPLATE_CSS = 'template_css';
    const CONDITIONS = 'conditions_serialized';
    const STORE = 'stores';
    public function getEntityId();
    public function setEntityId($entityId);
    public function getCategoryId();
    public function setCategoryId($categoryId);
    public function getSubCategoryId();
    public function setSubCategoryId($subCategoryId);
    public function getIsActive();
    public function setIsActive($isActive);
    public function getTypeDisplay();
    public function setTypeDisplay($typeDisplay);
    public function getDescription();
    public function setDescription($description);
    public function getSizeChartInfo();
    public function setSizeChartInfo($sizeChartInfo);
    public function getUpdatedAt();
    public function setUpdatedAt($updatedAt);
    public function getCreatedAt();
    public function setCreatedAt($createdAt);
    public function getTemplateCss();
    public function setTemplateCss($templateCss);
    public function getConditions();  
    public function setConditions($conditions);
    public function getStoreView();
    public function setStoreView($stores);
}
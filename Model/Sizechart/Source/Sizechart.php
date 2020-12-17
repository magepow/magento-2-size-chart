<?php

/**
 * Copyright © 2016 ExtensionsMall. All rights reserved.
 * See COPYING.txt for license details.
 */
/**
 * Source model for eav attribute custom_design
 */

namespace Magepow\Sizechart\Model\Sizechart\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

/**
 * Design
 *
 */
class Sizechart extends AbstractSource {

    protected $sizechartModel;

    public function __construct(\Magepow\Sizechart\Model\Sizechart $sizechartModel) {
        $this->sizechartModel = $sizechartModel;
    }

    /**
     * Retrieve All Design Theme Options
     *
     * @param bool $withEmpty add empty (please select) values to result
     * @return Label[]
     */
    public function getAllOptions($withEmpty = true) {
        $label = $withEmpty ? __('Inherit From Parent Category') : $withEmpty;
        $charts[] = array('value' => '', 'label' => $label);
        $data = $this->sizechartModel->getCollection()->getData();
        foreach ($data as $row) {
            $charts[] = array('value' => $row['entity_id'], 'label' => $row['name']);
        }
        return $this->_options = $charts;
    }

}

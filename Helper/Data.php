<?php

namespace Magepow\SizeChart\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Store\Model\ScopeInterface;

class Data extends AbstractHelper
{
    protected $configModule;
    protected $_moduleManager;
	
	 public function __construct(
        \Magento\Framework\App\Helper\Context $context,
         \Magento\Framework\Module\Manager $moduleManager
    )
    {

        parent::__construct($context);
         $this->configModule = $this->getConfig(strtolower($this->_getModuleName()));
          $this->_moduleManager = $moduleManager;
    }

    public function getConfig($configPath, $storeId = null)
    {
        return $this->scopeConfig->getValue(
            $configPath, ScopeInterface::SCOPE_STORE, $storeId
        );
    }
   public function getConfigModule($configPath='', $value=null)
    {
        $values = $this->configModule;
        if( !$configPath ) return $values;
        $config  = explode('/', $configPath);
        $end     = count($config) - 1;
        foreach ($config as $key => $vl) {
            if( isset($values[$vl]) ){
                if( $key == $end ) {
                    $value = $values[$vl];
                }else {
                    $values = $values[$vl];
                }
            } 

        }
        return $value;
    }

    public function isModuleEnabled($moduleName)
    {
      return $this->_moduleManager->isEnabled($moduleName);
    }
}
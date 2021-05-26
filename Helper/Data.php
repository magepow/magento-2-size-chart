<?php

namespace Magepow\Sizechart\Helper;

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
    public function getConfig($cfg='')
    {
        if($cfg) return $this->scopeConfig->getValue( $cfg, \Magento\Store\Model\ScopeInterface::SCOPE_STORE );
        return $this->scopeConfig;
    }

    public function getConfigModule($cfg='', $value=null)
    {
        $values = $this->configModule;
        if( !$cfg ) return $values;
        $config  = explode('/', $cfg);
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
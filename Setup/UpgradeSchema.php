<?php
namespace Magepow\SizeChart\Setup;
use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface
{
	  public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
    	$setup->startSetup();
        $tableName = $setup->getTable('sizechart_management');
            if (version_compare($context->getVersion(), '2.0.0', '<')) {
            	if ($setup->getConnection()->isTableExists($tableName) == true){
                $connection = $setup->getConnection();
                $connection->addColumn(
                    $setup->getTable($tableName),'name',['type' => Table::TYPE_TEXT,
                        'length' => '2M',
                        'nullable' => false,
                         'comment'=>'name']
                );
                $connection->addColumn(
                	$setup->getTable($tableName),'template_css',['type' => Table::TYPE_TEXT,
                        'length' => '2M',
                        'nullable' => true,
                         'comment'=>'template css']
                );

            }
            }
    }
}
<?php

namespace Magepow\SizeChart\Setup;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{

    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)

    {
        $installer = $setup;
        $installer->startSetup();
        if (!$installer->tableExists('sizechart_management')){
        $table = $installer->getConnection()
            ->newTable($installer->getTable('sizechart_management'));
        $table->addColumn(
            'entity_id',
            Table::TYPE_INTEGER,
            null,
            [
                'identity' => true,
                'unsigned' => true,
                'nullable' => false,
                'primary' => true
            ],
            'ENTITY ID'
        )
            ->addColumn(
               'category',
                 Table::TYPE_TEXT,
                 null,
                  [],
                 'category'
            )
            ->addColumn(
                'type_display',
                Table::TYPE_INTEGER,
                null,
                ['nullable'=>false,'default'=>1],
                'Size chart size display'
            )
            ->addColumn(
             'is_active',
                Table::TYPE_INTEGER,
                null,
                [
                    'nullable' => false,
                    'default' => '1',
                ],
                'Is Active status'
            )
            ->addColumn(
                'description',
                 Table::TYPE_TEXT,
                 '64k',
                  [],
                 'Description'
            )
            ->addColumn(
                 'sizechart_info',
                Table::TYPE_TEXT,
                '2M',
                [],
                'Size Chart Information'
            )
            ->addColumn(
                'updated_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
   				 null,
   				 ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT_UPDATE],
    			'Updated At'
            )
            ->addColumn(
                'created_at',
                \Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
   				 null,
   				 ['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
                'Creation Time'
            );
        }
        // $installer->getConnection()->createTable($table);
//            $installer->getConnection()->addIndex(
//                $installer->getTable('crud_news_post'),
//                $setup->getIdxName(
//                    $installer->getTable('crud_news_post'),
//                    ['name', 'url_key', 'post_content'],
//                    AdapterInterface::INDEX_TYPE_FULLTEXT
//                ),
//                [
//                    'name',
//
//                    'url_key',
//                    'post_content',
//
//                ],
//                AdapterInterface::INDEX_TYPE_FULLTEXT
//            );
        $installer->getConnection()->createTable($table);
        $installer->endSetup();
    }
}

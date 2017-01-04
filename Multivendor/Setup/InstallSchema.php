<?php

namespace Magestore\Multivendor\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
	
    $setup->startSetup();
    $setup->getConnection()->dropTable($setup->getTable('multivendor_vendor'));
    $table = $setup->getConnection()->newTable(
        $setup->getTable('multivendor_vendor')    
        )->addColumn(
                'vendor_id',
                \Magento\Framework\DB\Ddl\Table::TYPE_INTEGER,
                null,
                ['identity' => true, 'unsigned' => true,'nullable' => false, 'primary' => true],
                'vendor_id'
                );
    
    $setup->getConnection()->createTable($table);
    $setup->endSetup();
    }

}

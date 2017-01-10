<?php

namespace Magestore\Multivendor\Setup;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class InstallSchema implements InstallSchemaInterface
{
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {

        $setup->startSetup();
        /** multivendor table **/
        if($setup->getConnection()->isTableExists('multivendor_vendor')!=true){
            $table=$setup->getConnection()->newTable('multivendor_vendor')
                ->addColumn(
                    'vendor_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity'=>true,
                        'nullable'=>false,
                        'unsigned'=>true,
                        'primary'=>true
                    ],
                    'vendor_id'

                )
                ->addColumn(
                    'vendor_code',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable'=>false
                    ],
                    'vendor_code'
                )
                ->addColumn(
                    'name',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable'=>false
                    ],
                    'name'
                )
                ->addColumn(
                    'logo',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable'=>false
                    ],
                    'logo:image'
                )
                ->addColumn(
                    'created_at',
                    Table::TYPE_DATETIME,
                    null,
                    [
                        'nullable'=>false
                    ],
                    'created time'
                )
                ->addColumn(
                    'updated_at',
                    Table::TYPE_DATETIME,
                    null,
                    [
                        'nullable'=>false
                    ],
                    'updated time'
                )
                ->addColumn(
                    'address',
                    Table::TYPE_TEXT,
                    255,
                    [
                        'nullable'=>false
                    ],
                    'address'
                )
                ->addColumn(
                    'phone',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable'=>false
                    ],
                    'address'
                )
                ->addColumn(
                    'status',
                    Table::TYPE_INTEGER,
                    1,
                    [
                        'nullable'=>false
                    ],
                    'status'
                );
//                ->setComment(Constant::TYPE_TABLE_COMMENT)
//                ->setOption('type','InnoDB')
//                ->setOption('charset','utf8');
            $setup->getConnection()->createTable($table);
        }
        /** multivendor_vendor_product**/
        if($setup->getConnection()->isTableExists('multivendor_vendor_product')!=true){
            $table=$setup->getConnection()->newTable('multivendor_vendor_product')
                ->addColumn(
                    'multivendor_vendor_product',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'identity'=>true,
                        'nullable'=>false,
                        'unsigned'=>true,
                        'primary'=>true
                    ],
                    'multivendor_vendor_product'

                )
                ->addColumn(
                    'vendor_id',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable'=>false
                    ],
                    'vendor_id'
                )
                ->addColumn(
                    'product_ids',
                    Table::TYPE_INTEGER,
                    null,
                    [
                        'nullable'=>false
                    ],
                    'product_ids'
                );
//                ->setComment(Constant::TYPE_TABLE_COMMENT)
//                ->setOption('type','InnoDB')
//                ->setOption('charset','utf8');
            $setup->getConnection()->createTable($table);
        }
        $setup->endSetup();
    }

}
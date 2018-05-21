<?php
namespace IdealCode\Banner\Setup;

use Magento\Framework\DB\Ddl\Table;

class InstallSchema implements \Magento\Framework\Setup\InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(
        \Magento\Framework\Setup\SchemaSetupInterface $setup,
        \Magento\Framework\Setup\ModuleContextInterface $context
    )
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * Create table 'ic_banner_items'
         */
        $table = $installer->getConnection()->newTable(
            $installer->getTable('ic_banner_items')
        )->addColumn(
            'id',
            Table::TYPE_INTEGER,
            null,
            ['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true]
        )->addColumn(
            'active',
            Table::TYPE_SMALLINT,
            null,
            ['nullable' => false, 'default' => '1']
        )->addColumn(
            'sort',
            Table::TYPE_INTEGER,
            null,
            ['unsigned' => true]
        )->addColumn(
            'content',
            Table::TYPE_TEXT,
            null,
            []
        )->addColumn(
            'img',
            Table::TYPE_TEXT,
            255,
            ['nullable' => false]
        )->addColumn(
            'link',
            Table::TYPE_TEXT,
            255,
            []
        );

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}

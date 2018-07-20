<?php
namespace IdealCode\Banner\Ui\Component;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection $collection
     * @param string $name
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection $collection,
        $name,
        array $meta = [],
        array $data = []
    )
    {
        $idFieldName = $collection->getResource()->getIdFieldName();

        parent::__construct($name, $idFieldName, $idFieldName, $meta, $data);
        $this->collection = $collection;
    }
}

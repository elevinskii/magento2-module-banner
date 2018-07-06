<?php
namespace IdealCode\Banner\Ui\Component;

class DataProvider extends \Magento\Ui\DataProvider\AbstractDataProvider
{
    /**
     * @param \IdealCode\Banner\Model\ResourceModel\Banner\CollectionFactory $collectionFactory
     * @param string $name
     * @param array $meta
     * @param array $data
     */
    public function __construct(
        \IdealCode\Banner\Model\ResourceModel\Banner\CollectionFactory $collectionFactory,
        $name,
        array $meta = [],
        array $data = []
    )
    {
        /** @var \IdealCode\Banner\Model\ResourceModel\Banner\Collection $collection */
        $collection = $collectionFactory->create();
        $idFieldName = $collection->getResource()->getIdFieldName();

        parent::__construct($name, $idFieldName, $idFieldName, $meta, $data);
        $this->collection = $collection;
    }
}

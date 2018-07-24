<?php
namespace IdealCode\Banner\Block\Widget;

use \IdealCode\Banner\Model\Item\Active;

class ItemList extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{
    /**
     * @var \IdealCode\Banner\Model\ResourceModel\Item\Collection
     */
    protected $_collectionFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \IdealCode\Banner\Model\ResourceModel\Item\CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \IdealCode\Banner\Model\ResourceModel\Item\CollectionFactory $collectionFactory,
        array $data = []
    ){
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Get banner list
     * @return array
     */
    public function getItems()
    {
        /**
         * @var \IdealCode\Banner\Model\ResourceModel\Item\Collection $item
         */
        $item = $this->_collectionFactory->create();

        $item
            ->addFieldToFilter(Active::COLUMN, Active::STATUS_ENABLED)
            ->setOrder('sort', $item::SORT_ORDER_ASC);

        return $item->getData();
    }
}

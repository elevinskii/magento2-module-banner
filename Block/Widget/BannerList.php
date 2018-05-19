<?php
namespace IdealCode\Banner\Block\Widget;

class BannerList extends \Magento\Framework\View\Element\Template implements \Magento\Widget\Block\BlockInterface
{
    /**
     * @var \IdealCode\Banner\Model\ResourceModel\Banner\Collection
     */
    protected $_collectionFactory;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \IdealCode\Banner\Model\ResourceModel\Banner\CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \IdealCode\Banner\Model\ResourceModel\Banner\CollectionFactory $collectionFactory,
        array $data = []
    ){
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Get banner list
     * @return array
     */
    public function getBanners()
    {
        /**
         * @var \IdealCode\Banner\Model\ResourceModel\Banner\Collection $banner
         */
        $banner = $this->_collectionFactory->create();

        return $banner->getData();
    }
}

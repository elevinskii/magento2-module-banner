<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

abstract class Action extends \IdealCode\Banner\Controller\Adminhtml\Banner
{
    /**
     * @var \IdealCode\Banner\Model\ItemFactory
     */
    protected $_itemFactory;

    /**
     * @var \IdealCode\Banner\Model\ResourceModel\Item
     */
    protected $_itemResource;

    /**
     * @var \IdealCode\Banner\Model\ResourceModel\Item\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $_filter;

    /**
     * @var \Magento\MediaStorage\Model\File\UploaderFactory
     */
    protected $_uploaderFactory;

    /**
     * @var \Magento\Framework\Filesystem\Directory\WriteInterface
     */
    protected $_mediaDirectory;

    /**
     * Action constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory
     * @param \Magento\Framework\Filesystem $filesystem
     * @param \IdealCode\Banner\Model\ItemFactory $itemFactory
     * @param \IdealCode\Banner\Model\ResourceModel\Item $itemResource
     * @param \IdealCode\Banner\Model\ResourceModel\Item\CollectionFactory $collectionFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Ui\Component\MassAction\Filter $filter,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory,
        \Magento\Framework\Filesystem $filesystem,
        \IdealCode\Banner\Model\ItemFactory $itemFactory,
        \IdealCode\Banner\Model\ResourceModel\Item $itemResource,
        \IdealCode\Banner\Model\ResourceModel\Item\CollectionFactory $collectionFactory
    )
    {
        $this->_itemFactory = $itemFactory;
        $this->_itemResource = $itemResource;
        $this->_collectionFactory = $collectionFactory;
        $this->_filter = $filter;
        $this->_uploaderFactory = $uploaderFactory;
        $this->_mediaDirectory = $filesystem->getDirectoryWrite(
            \Magento\Framework\App\Filesystem\DirectoryList::MEDIA
        );
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\Data\Collection\AbstractDb
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getFilterCollection()
    {
        return $this->_filter->getCollection($this->_collectionFactory->create());
    }
}

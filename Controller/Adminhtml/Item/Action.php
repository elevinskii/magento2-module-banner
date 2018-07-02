<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

abstract class Action extends \IdealCode\Banner\Controller\Adminhtml\Banner
{
    /**
     * @var \IdealCode\Banner\Model\BannerFactory
     */
    protected $_bannerFactory;

    /**
     * @var \IdealCode\Banner\Model\ResourceModel\Banner
     */
    protected $_bannerResource;

    /**
     * @var \Magento\Ui\Component\MassAction\Filter
     */
    protected $_filter;

    /**
     * @var \IdealCode\Banner\Model\ResourceModel\Banner\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var \Magento\MediaStorage\Model\File\UploaderFactory
     */
    protected $_uploaderFactory;

    /**
     * @var \Magento\Framework\Filesystem
     */
    protected $_filesystem;

    /**
     * Action constructor.
     * @param \Magento\Backend\App\Action\Context $context
     * @param \IdealCode\Banner\Model\BannerFactory $bannerFactory
     * @param \IdealCode\Banner\Model\ResourceModel\Banner $bannerResource
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param \IdealCode\Banner\Model\ResourceModel\Banner\CollectionFactory $collectionFactory
     * @param \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory
     * @param \Magento\Framework\Filesystem $filesystem
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \IdealCode\Banner\Model\BannerFactory $bannerFactory,
        \IdealCode\Banner\Model\ResourceModel\Banner $bannerResource,
        \Magento\Ui\Component\MassAction\Filter $filter,
        \IdealCode\Banner\Model\ResourceModel\Banner\CollectionFactory $collectionFactory,
        \Magento\MediaStorage\Model\File\UploaderFactory $uploaderFactory,
        \Magento\Framework\Filesystem $filesystem
    )
    {
        $this->_bannerFactory = $bannerFactory;
        $this->_bannerResource = $bannerResource;
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        $this->_uploaderFactory = $uploaderFactory;
        $this->_filesystem = $filesystem;
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

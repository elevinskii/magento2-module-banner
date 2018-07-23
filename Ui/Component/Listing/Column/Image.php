<?php
namespace IdealCode\Banner\Ui\Component\Listing\Column;

class Image extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * @var \Magento\Framework\Model\ResourceModel\Db\AbstractDb
     */
    protected $_resource;

    protected $_mediaPath;

    /**
     * Image constructor.
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     * @param \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource
     * @param string $mediaPath
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magento\Framework\Model\ResourceModel\Db\AbstractDb $resource,
        $mediaPath,
        array $components = [],
        array $data = []
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_storeManager = $storeManager;
        $this->_resource = $resource;
        $this->_mediaPath = $mediaPath;
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {

            $idFieldName = $this->_resource->getIdFieldName();
            $fieldName = $this->getName();

            /** @var \IdealCode\Banner\Model\Item $item */
            foreach ($dataSource['data']['items'] as & $item) {
                $url = '';

                if ($item[$fieldName] != '') {
                    $url = $this->_storeManager->getStore()->getBaseUrl(
                            \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                        ).$this->_mediaPath.$item[$fieldName];
                }

                $item[$fieldName.'_src'] = $url;
                $item[$fieldName.'_link'] = $this->context->getUrl(
                    $this->getUrl().'/edit',
                    [$idFieldName => $item[$idFieldName]]
                );

                $item[$fieldName.'_orig_src'] = $url;
           }
        }

        return $dataSource;
    }
}

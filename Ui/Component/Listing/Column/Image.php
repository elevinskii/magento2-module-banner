<?php
namespace IdealCode\Banner\Ui\Component\Listing\Column;

class Image extends \Magento\Ui\Component\Listing\Columns\Column
{
    /**
     * @var \Magento\Store\Model\StoreManagerInterface
     */
    protected $_storeManager;

    /**
     * Image constructor.
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param array $components
     * @param array $data
     * @param \Magento\Store\Model\StoreManagerInterface $storeManager
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = [],
        \Magento\Store\Model\StoreManagerInterface $storeManager
    )
    {
        parent::__construct($context, $uiComponentFactory, $components, $data);
        $this->_storeManager = $storeManager;
    }

    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');

            /** @var \IdealCode\Banner\Model\Banner $item */
            foreach ($dataSource['data']['items'] as & $item) {
                $url = '';

                if ($item[$fieldName] != '') {
                    $url = $this->_storeManager->getStore()->getBaseUrl(
                            \Magento\Framework\UrlInterface::URL_TYPE_MEDIA
                        ).\IdealCode\Banner\Model\Banner::BASE_MEDIA_PATH.$item[$fieldName];
                }

                $item[$fieldName.'_src'] = $url;
                $item[$fieldName.'_link'] = $this->context->getUrl(
                    'adminhtml/banner/edit',
                    ['id' => $item['id']]
                );

                $item[$fieldName.'_orig_src'] = $url;
           }
        }

        return $dataSource;
    }
}

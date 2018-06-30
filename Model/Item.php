<?php
namespace IdealCode\Banner\Model;

class Item extends \Magento\Framework\Model\AbstractModel
{
    const BASE_MEDIA_PATH = 'banner/images/';

    protected function _construct()
    {
        $this->_init(ResourceModel\Item::class);
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->getData('link');
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->getData('content');
    }

    /**
     * Get image url
     *
     * @return bool|string
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getImage()
    {
        $url = false;
        $image = $this->getData('img');

        /** @var \Magento\Store\Model\StoreManagerInterface $storeManager */
        $storeManager = $this->getData('storeManager');

        /** @var \Magento\Store\Model\Store $store */
        $store = $storeManager->getStore();

        if($image) {
            if(is_string($image)) {
                $url = $store->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA)
                    .self::BASE_MEDIA_PATH
                    .$image;
            } else {
                throw new \Magento\Framework\Exception\LocalizedException(
                    __('Something went wrong while getting the image url.')
                );
            }
        }
        return $url;
    }
}

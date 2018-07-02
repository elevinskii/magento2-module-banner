<?php
namespace IdealCode\Banner\Model;

class Banner extends \Magento\Framework\Model\AbstractModel
{
    const BASE_MEDIA_PATH = 'banner/images';

    protected function _construct()
    {
        $this->_init(ResourceModel\Banner::class);
    }

    /**
     * Set Active flag
     *
     * @param int $active
     * @return Banner
     */
    public function setActive($active)
    {
        return $this->setData(\IdealCode\Banner\Model\Banner\Active::COLUMN, $active);
    }
}

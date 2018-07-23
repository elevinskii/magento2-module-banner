<?php
namespace IdealCode\Banner\Model;

class Item extends \Magento\Framework\Model\AbstractModel
{
    const BASE_MEDIA_PATH = 'banner/images';

    protected function _construct()
    {
        $this->_init(ResourceModel\Item::class);
    }

    /**
     * Set Active flag
     *
     * @param int $active
     * @return Item
     */
    public function setActive($active)
    {
        return $this->setData(Item\Active::COLUMN, $active);
    }
}

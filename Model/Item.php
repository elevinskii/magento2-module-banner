<?php
namespace IdealCode\Banner\Model;

class Item extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Item::class);
    }
}

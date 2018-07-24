<?php
namespace IdealCode\Banner\Model\ResourceModel;

class Item extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('ic_banner_items', 'id');
    }
}

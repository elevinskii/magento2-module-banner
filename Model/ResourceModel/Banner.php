<?php
namespace IdealCode\Banner\Model\ResourceModel;

class Banner extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('ic_banner_items', 'id');
    }
}

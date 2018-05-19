<?php
namespace IdealCode\Banner\Model\ResourceModel\Banner;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    public function _construct()
    {
        $this->_init(
            'IdealCode\Banner\Model\Banner',
            'IdealCode\Banner\Model\ResourceModel\Banner'
        );
    }
}

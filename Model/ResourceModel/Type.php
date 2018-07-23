<?php
namespace IdealCode\Banner\Model\ResourceModel;

class Type extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('ic_banner_types', 'id');
    }
}

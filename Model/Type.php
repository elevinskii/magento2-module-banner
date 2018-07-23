<?php
namespace IdealCode\Banner\Model;

class Type extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(ResourceModel\Type::class);
    }
}

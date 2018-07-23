<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class Index extends \IdealCode\Banner\Controller\Adminhtml\Banner
{
    public function execute()
    {
        return $this->initPage('Items', 'IdealCode_Banner::item');
    }
}

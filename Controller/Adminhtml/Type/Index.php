<?php
namespace IdealCode\Banner\Controller\Adminhtml\Type;

class Index extends \IdealCode\Banner\Controller\Adminhtml\Banner
{
    public function execute()
    {
        return $this->initPage('Types');
    }
}

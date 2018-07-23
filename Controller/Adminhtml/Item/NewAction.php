<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class NewAction extends Action
{
    public function execute()
    {
        $this->_forward('edit');
    }
}

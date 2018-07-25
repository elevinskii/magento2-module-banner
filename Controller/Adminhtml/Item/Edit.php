<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class Edit extends Action
{
    public function execute()
    {
        $id = $this->getRequest()->getParam($this->_itemResource->getIdFieldName());

        /** @var \IdealCode\Banner\Model\Item $item */
        $item = $this->_itemFactory->create();

        if ($id) {
            $this->_itemResource->load($item, $id);

            if (!$item->getId()) {
                $this->messageManager->addErrorMessage(__('This item no longer exists.'));

                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        return $this->initPage($item->getId() ? 'Edit Item' : 'New Item', 'IdealCode_Banner::item');
    }
}

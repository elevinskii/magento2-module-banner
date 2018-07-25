<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class Delete extends Action
{
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $idFieldName = $this->_itemResource->getIdFieldName();

        $id = $this->getRequest()->getParam($idFieldName);

        if ($id) {
            try {
                /** @var \IdealCode\Banner\Model\Item $item */
                $item = $this->_itemFactory->create();

                $this->_itemResource->load($item, $id)->delete($item);

                $this->messageManager->addSuccessMessage(__('You deleted the item.'));
                return $resultRedirect->setPath('*/*/');
            }
            catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', [$idFieldName => $id]);
            }
        }

        $this->messageManager->addErrorMessage(__('We can\'t find a item to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}

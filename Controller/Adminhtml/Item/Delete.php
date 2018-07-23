<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class Delete extends Action
{
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('id');

        if ($id) {
            try {
                /** @var \IdealCode\Banner\Model\Banner $banner */
                $banner = $this->_bannerFactory->create();

                $this->_bannerResource->load($banner, $id)->delete($banner);

                $this->messageManager->addSuccessMessage(__('You deleted the banner.'));
                return $resultRedirect->setPath('*/*/');
            }
            catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }

        $this->messageManager->addErrorMessage(__('We can\'t find a banner to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}

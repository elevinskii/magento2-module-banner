<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class Edit extends Action
{
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');

        /** @var \IdealCode\Banner\Model\Banner $banner */
        $banner = $this->_bannerFactory->create();

        if ($id) {
            $this->_bannerResource->load($banner, $id);

            if (!$banner->getId()) {
                $this->messageManager->addErrorMessage(__('This banner no longer exists.'));

                /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
                $resultRedirect = $this->resultRedirectFactory->create();
                return $resultRedirect->setPath('*/*/');
            }
        }

        return $this->initPage($banner->getId() ? 'Edit Banner' : 'New Banner');
    }
}

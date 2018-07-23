<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class Save extends Action
{
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultFactory->create(
            \Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT
        );

        $data = $this->getRequest()->getPostValue();

        if ($data) {
            $id = $this->getRequest()->getParam('id');

            if (empty($data['id']))
            {
                $data['id'] = null;
            }

            /** @var \IdealCode\Banner\Model\Banner $banner */
            $banner = $this->_bannerFactory->create();

            $this->_bannerResource->load($banner, $id);

            if (!$banner->getId() && $id)
            {
                $this->messageManager->addErrorMessage(__('This banner no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

             // Image upload
             if ($this->getRequest()->getFiles('img')) {
                try {
                    /** @var \Magento\MediaStorage\Model\File\Uploader $uploader */
                    $uploader = $this->_uploaderFactory->create(['fileId' => 'img']);
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
                    $uploader->setAllowRenameFiles(true);
                    $uploader->setFilesDispersion(true);

                    $result = $uploader->save(
                        $this->_mediaDirectory->getAbsolutePath(\IdealCode\Banner\Model\Banner::BASE_MEDIA_PATH)
                    );

                    $data['img'] = $result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addErrorMessage($e->getMessage());
                    }
                }
            }

            $banner->setData($data);

            try {
                $this->_bannerResource->save($banner);
                $this->messageManager->addSuccessMessage(__('The banner has been saved.'));

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $banner->getId()]);
                }

                return $resultRedirect->setPath('*/*/');

            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the banner.'));
            }

            return $resultRedirect->setPath(
                '*/*/edit', ['id' => $this->getRequest()->getParam('id')]
            );
        }

        return $resultRedirect->setPath('*/*/');
    }
}

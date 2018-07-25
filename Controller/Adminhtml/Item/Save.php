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

        $idFieldName = $this->_itemResource->getIdFieldName();

        if ($data) {
            $id = $this->getRequest()->getParam($idFieldName);

            if (empty($data[$idFieldName]))
            {
                $data[$idFieldName] = null;
            }

            /** @var \IdealCode\Banner\Model\Item $item */
            $item = $this->_itemFactory->create();

            $this->_itemResource->load($item, $id);

            if (!$item->getId() && $id)
            {
                $this->messageManager->addErrorMessage(__('This item no longer exists.'));
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
                        $this->_mediaDirectory->getAbsolutePath(\IdealCode\Banner\Model\Item::BASE_MEDIA_PATH)
                    );

                    $data['img'] = $result['file'];
                } catch (\Exception $e) {
                    if ($e->getCode() == 0) {
                        $this->messageManager->addErrorMessage($e->getMessage());
                    }
                }
            }

            $item->setData($data);

            try {
                $this->_itemResource->save($item);
                $this->messageManager->addSuccessMessage(__('The item has been saved.'));

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', [$idFieldName => $item->getId()]);
                }

                return $resultRedirect->setPath('*/*/');

            } catch (\Exception $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the item.'));
            }

            return $resultRedirect->setPath(
                '*/*/edit', [$idFieldName => $this->getRequest()->getParam($idFieldName)]
            );
        }

        return $resultRedirect->setPath('*/*/');
    }
}

<?php
namespace IdealCode\Banner\Controller\Adminhtml\Item;

class InlineEdit extends Action
{
    public function execute()
    {
        $postItems = $this->getRequest()->getParam('items', []);

        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultFactory->create(
            \Magento\Framework\Controller\ResultFactory::TYPE_JSON
        );

        if (!($this->getRequest()->getParam('isAjax') && count($postItems))) {
            return $resultJson->setData([
                'messages' => [__('Please correct the data sent.')],
                'error' => true,
            ]);
        }

        foreach ($postItems as $id => $item) {
            /** @var \IdealCode\Banner\Model\Banner $banner */
            $banner = $this->_bannerFactory->create();

            $this->_bannerResource->load($banner, $id);

            foreach ($item as $key => $value) {
                $banner->setData($key, $value);
            }

            $this->_bannerResource->save($banner);
        }

        return $resultJson->setData([
            'message' => __('A total of %1 banner(s) have been saved.', count($postItems)),
            'error' => false
        ]);
    }
}

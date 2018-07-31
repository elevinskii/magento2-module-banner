<?php
namespace IdealCode\Banner\Ui\Component\Form\Buttons;

class Delete extends GenericButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface
{
    public function getButtonData()
    {
        $data = [];
        if ($this->_id) {
            $data = [
                'label' => __('Delete Item'),
                'on_click' => 'deleteConfirm(\'' . __(
                        'Are you sure you want to do this?'
                    ) . '\', \'' . $this->_urlBuilder->getUrl(
                        '*/*/delete',
                        [
                            $this->_resource->getIdFieldName() => $this->_id
                        ]) . '\')',
                'sort_order' => 20,
            ];
        }

        return $data;
    }
}

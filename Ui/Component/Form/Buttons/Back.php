<?php
namespace IdealCode\Banner\Ui\Component\Form\Buttons;

class Back extends GenericButton implements \Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface
{
    public function getButtonData()
    {
        return [
            'label' => __('Back'),
            'class' => 'back',
            'on_click' => sprintf("location.href = '%s';", $this->_urlBuilder->getUrl('*/*/')),
            'sort_order' => 10
        ];
    }
}

<?php
namespace IdealCode\Banner\Ui\Component\Form\Buttons;

class GenericButton
{
    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $_urlBuilder;

    protected $_id;

    /**
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param \Magento\Framework\App\RequestInterface $request
     */
    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\App\RequestInterface $request
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_id = $request->getParam('id');
    }
}

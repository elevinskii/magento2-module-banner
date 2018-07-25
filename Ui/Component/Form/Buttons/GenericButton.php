<?php
namespace IdealCode\Banner\Ui\Component\Form\Buttons;

class GenericButton
{
    /**
     * @var \Magento\Framework\UrlInterface
     */
    protected $_urlBuilder;

    /**
     * @var \IdealCode\Banner\Model\ResourceModel\Item
     */
    protected $_resource;

    protected $_id;

    /**
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param \Magento\Framework\App\RequestInterface $request
     * @param \IdealCode\Banner\Model\ResourceModel\Item $resource
     */
    public function __construct(
        \Magento\Framework\UrlInterface $urlBuilder,
        \Magento\Framework\App\RequestInterface $request,
        \IdealCode\Banner\Model\ResourceModel\Item $resource
    ) {
        $this->_urlBuilder = $urlBuilder;
        $this->_resource = $resource;
        $this->_id = $request->getParam($this->_resource->getIdFieldName());
    }
}

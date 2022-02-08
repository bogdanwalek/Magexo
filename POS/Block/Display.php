<?php
namespace Magexo\POS\Block;
class Display extends \Magento\Framework\View\Element\Template
{
	protected $_postFactory;
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Magexo\POS\Model\PostFactory $postFactory
	)
	{
		$this->_postFactory = $postFactory;
		parent::__construct($context);
	}

	public function getPointCollection(){
		$point = $this->_postFactory->create();
		return $point->getCollection();
	}
}
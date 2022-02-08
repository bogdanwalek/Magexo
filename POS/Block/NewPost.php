<?php
namespace Magexo\POS\Block;
class NewPost extends \Magento\Backend\Block\Widget\Form\Container
{
	protected $_coreRegistry = null;
	public function __construct(
		\Magento\Backend\Block\Widget\Context $context,
		\Magento\Framework\Registry $registry,
        array $data = []
	)
	{
		$this->_coreRegistry = $registry;
		parent::__construct($context,$data);
	}


	protected function _construct(){
		$this->_objectID = 'point_id';
        $this->_blockGroup = 'Magexo_POS';
        $this->_controller = 'adminhtml';
		parent::_construct();
	}
}
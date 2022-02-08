<?php

namespace Magexo\POS\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface
{
	protected $_postFactory;
	protected $is_available;

	public function __construct(\Magexo\POS\Model\PostFactory $postFactory)
	{
		$this->_postFactory = $postFactory;
	}

	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
	{
		for($i=1;$i<=100;$i++)
		{
			if($i % 2 == 0) $is_available = 1;
			else $is_available = 0;
			$data = [
			'name' => "Point of Sale ".$i,
			'address' => "Address of Point of Sale ".$i,
			'is_available' => $is_available
			];
			$post = $this->_postFactory->create();
			$post->addData($data)->save();
		}
	}
}
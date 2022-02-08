<?php
namespace Magexo\POS\Model;
class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	//DB table name
	const CACHE_TAG = 'magexo_pos_points';

	protected $_cacheTag = 'magexo_pos_points';

	protected $_eventPrefix = 'magexo_pos_points';

	protected function _construct()
	{
		$this->_init('Magexo\POS\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
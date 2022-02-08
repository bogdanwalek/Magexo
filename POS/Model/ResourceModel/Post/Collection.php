<?php
namespace Magexo\POS\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	//Definition of DB variables
	protected $_idFieldName = 'point_id';
	protected $_eventPrefix = 'magexo_pos_points_collection';
	protected $_eventObject = 'points_collection';

	protected function _construct()
	{
		$this->_init('Magexo\POS\Model\Post', 'Magexo\POS\Model\ResourceModel\Post');
	}

}
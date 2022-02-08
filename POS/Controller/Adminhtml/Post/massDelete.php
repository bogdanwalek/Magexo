<?php
namespace Magexo\POS\Controller\Adminhtml\Post;
 
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Magexo\POS\Model\ResourceModel\Post\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;
 
class MassDelete extends \Magento\Backend\App\Action
{

    protected $_filter;
    protected $_collectionFactory;

    public function __construct(Context $context, Filter $filter,CollectionFactory $collectionFactory)
    {
        $this->_filter = $filter;
        $this->_collectionFactory = $collectionFactory;
        parent::__construct($context);
    }


   
    public function execute()
    {
        $collection = $this->_filter->getCollection($this->_collectionFactory->create());
        $collectionSize = $collection->getSize();
        foreach ($collection as $item) 
        {
            $item->delete();
        }
        $this->messageManager->addSuccess(__('A total of %1 point(s) of sale have been deleted.', $collectionSize));
        $resultRedirect = $this->resultFactory->create(\Magento\Framework\Controller\ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
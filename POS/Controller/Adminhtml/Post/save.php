<?php
namespace Magexo\POS\Controller\Adminhtml\Post;
 
use Magento\Backend\App\Action;
use Magento\TestFramework\ErrorLog\Logger;
 
class Save extends \Magento\Backend\App\Action
{
     
    public function __construct(Action\Context $context)
    {
        parent::__construct($context);
    } 
     
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        
        $resultRedirect = $this->resultRedirectFactory->create();
 
        if ($data) 
        {
            $model = $this->_objectManager->create('Magexo\POS\Model\Post');
            $model->setData($data);
            
            $this->_eventManager->dispatch(
              'point_prepare_save',
              ['post' => $model, 'request' => $this->getRequest()]
            );
            
 
            try {
                // Save point
                $model->save();
 
                // Display success message
                $this->messageManager->addSuccess(__('The new point has been saved.'));
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);
                
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
            }
            
 
            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit');
        }
        return $resultRedirect->setPath('*/*/edit');
    }
}
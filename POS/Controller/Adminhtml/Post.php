<?php
namespace Magexo\POS\Controller\Adminhtml;

abstract class Post extends \Magento\Backend\App\Action
{

    protected $_postFactory;
    protected $_coreRegistry;
    protected $_resultRedirectFactory;

    public function __construct(
        \Magexo\POS\Model\PostFactory $postFactory,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Model\View\Result\RedirectFactory $resultRedirectFactory,
        \Magento\Backend\App\Action\Context $context
    )
    {
        $this->_postFactory           = $postFactory;
        $this->_coreRegistry          = $coreRegistry;
        $this->_resultRedirectFactory = $resultRedirectFactory;
        parent::__construct($context);
    }

    /**
     * Init Point
     *
     * @return \Magexo\POS\Model\Post
     */
    protected function _initPost()
    {
        $postId  = (int) $this->getRequest()->getParam('point_id');
        $post    = $this->_postFactory->create();
        if ($postId) {
            $post->load($postId);
        }
        $this->_coreRegistry->register('magexo_pos_post', $post);
        return $post;
    }
}
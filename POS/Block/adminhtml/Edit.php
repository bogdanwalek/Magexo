<?php
namespace Magexo\POS\Block\Adminhtml\Post;

class Edit extends \Magento\Backend\Block\Widget\Form\Container
{
    /**
     * Core registry
     * 
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    public function __construct(
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Block\Widget\Context $context,
        array $data = []
    )
    {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize Point edit block
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_objectId = 'point_id';
        $this->_blockGroup = 'Magexo_POS';
        $this->_controller = 'adminhtml_post';
        parent::_construct();
        $this->buttonList->update('save', 'label', __('Save Point'));
        $this->buttonList->add(
            'save-and-continue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => [
                            'event' => 'saveAndContinueEdit',
                            'target' => '#edit_form'
                        ]
                    ]
                ]
            ],
            -100
        );
        $this->buttonList->update('delete', 'label', __('Delete Post'));
    }
 
    public function getHeaderText()
    {
        $post = $this->_coreRegistry->registry('magexo_pos_post');
        if ($post->getId()) {
            return __("Edit Point '%1'", $this->escapeHtml($post->getName()));
        }
        return __('New Point');
    }
}
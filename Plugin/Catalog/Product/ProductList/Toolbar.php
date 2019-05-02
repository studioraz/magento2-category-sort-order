<?php

namespace SR\CategorySortOrder\Plugin\Catalog\Product\ProductList;

use Magento\Framework\Registry;


class Toolbar
{
    /**
     * @var \Magento\Catalog\Model\Product\ProductList\Toolbar
     */
    private $toolbarModel;

    /**
     * @var Registry
     */
    private $registry;

    public function __construct(
        \Magento\Catalog\Model\Product\ProductList\Toolbar $toolbarModel,
        Registry $registry
    ) {
        $this->toolbarModel = $toolbarModel;
        $this->registry = $registry;
    }

    /**
     * @param \Magento\Catalog\Block\Product\ProductList\Toolbar $subject
     * @param string                                             $dir
     *
     * @return string
     */
    public function afterGetCurrentDirection($subject, $dir)
    {
        $currentCategory = $this->registry->registry('current_category');
        if( $currentCategory->getSortOrder()) {
            $subject->setDefaultDirection($currentCategory->getSortOrder());
            if (!$this->toolbarModel->getDirection() ) {
                $dir = $currentCategory->getSortOrder();;
            }
        }
        return $dir;
    }



}
